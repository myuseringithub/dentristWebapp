<?php

namespace SZN; // should be on top.

if ( ! defined( 'ABSPATH' ) ) { exit; } // security measure

class DataManipulation {

	public $examinationPosts;
	public $mcqPosts;
	public $examinationsAdded = [];

	public function __construct($mcqPosts, $examinationPosts) {
		$this->examinationPosts = $examinationPosts;
		$this->mcqPosts = $mcqPosts;
	}

	public function mergeQuestionsWithExaminations() {
		$this->removeParentExaminations();
		$this->decodeSpecialCharsExaminations();
		$this->decodeSpecialCharsMCQs();
		$this->addACFToMCQs();
		$this->addQuestionsToExaminations();

		// ! important ! array_values will remove all keys in array, which will prevent output of JSON as object of objects. It rather needs to be Array of Objects.
		return array_values($this->examinationPosts);
	}


	public function removeParentExaminations() {
		foreach( $this->examinationPosts as $examinationKey => $examination) {
			if($examination->post_parent == 0) {
				unset($this->examinationPosts[$examinationKey]);
			}
		}
	}

	public function decodeSpecialCharsExaminations() {
		foreach( $this->examinationPosts as $examination) {
			$examination->guid = htmlspecialchars_decode($examination->guid);
		}
	}

	public function decodeSpecialCharsMCQs() {
		foreach( $this->mcqPosts as $mcq) {
			$mcq->guid = htmlspecialchars_decode($mcq->guid);

			// added a link to edit page for each question.
			$mcq->edit = WP_HOME . '/site/wp-admin/post.php?post='. $mcq->ID .'&action=edit';
		}
	}

	public function addACFToMCQs() {
		foreach( $this->mcqPosts as $mcq) {
			$mcq->acf = get_fields($mcq->ID);
		}
	}

	public function addQuestionsToExaminations() {

		foreach( $this->examinationPosts as $examinationKey => $examination) {
			$examination->MCQs = [];
			$examination->AdditionalMCQs = [];
			foreach( $this->mcqPosts as $mcq) {
					if($this->isMCQInExamination($mcq, $examination)) {
						if(in_array($mcq, $this->examinationsAdded)) {
							$examination->AdditionalMCQs[] = $mcq;
						} else {
							$examination->MCQs[] = $mcq;
							$this->examinationsAdded[] = $mcq;
						}
					}
			}
		}

	}

	public function isMCQInExamination($mcq, $examination) {
		$examinationFields = get_field('examination', $mcq);
		foreach( $examinationFields as $examinationField) {
			if($examinationField->post_title == $examination->post_title) {
				return true;
			}
		}
		return false;
	}



}
