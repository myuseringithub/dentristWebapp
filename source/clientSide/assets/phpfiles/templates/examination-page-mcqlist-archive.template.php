<!-- Attention about the examination -->
	<section onclick="clickHandler(event)" style="text-align:center;direction: rtl;">

		<paper-button data-dialog="scrolling" align="center" style="margin:auto;direction: rtl; margin-bottom:10px; margin-top:10px;">חובה לקרוא !</paper-button>

		<!-- Attention dialog -->
		<paper-dialog id="scrolling" style="text-align:right;">
			<h2 style="text-align:center;direction: ltr;">Attention ! Several things to mention:</h2>
			<paper-dialog-scrollable>
				<p>כתבתי את זה מהר אז תסלחו לי אם משהו לא מובן.</p>
				<p>1. חלק מהשאלות באתר ממוזגות ממבחני רישוי שונים. ניסוח קצת שונה יכול גם לשנות את התשובה המועדפת. </p>
				<p>2. לחלק מהשאלות במבחן יכול להיות ניסוח מטעה ולא שלם. לשאלה יכולות להיות מספר תשובות נכונות, אך בפועל מוגדרת רק תשובה אחת כנכונה. לפעמיםאחרי ערעור מוסיפים את אחת האופציות כתשובה נכונה ומקובלת בשאלה, ומוסיפים נקודות לכל מי שענה בה.</p>
				<p> 3. המשרד האחראי על מבחני הרישוי מחליט לפעמים להוסיף את אחת האופציות כתשובה נכונה מסיבות של ערעורים על השאלה. ואף מבטל שאלות מסוימות אם ניסוחם מטעה או לא נכון. כך שזה לא 100% נכון או 100% לא נכון.</p>
				<p>	4. בערעורים כותבים את התשובה הלא נכונה. אך גם כאן יש מקום לטעויות מטעם משרד הבריאות או הבוחנים. כל שנה כמעט יש שינויים בחלק מהשאלות ופוסלים חלק. היו מקרים בהם ערעורים שונים נוגדים אחד את השני. חלק גדול מהערעורים המוגשים מתקבלים.</p>
				<p>התשובות באתר מבוססות על שחזורים קודמים, חומר אוניברסיטת ת"א וירושלים, מקורות שונים כמו ספרים ואנטרנט, והגיון, ולבסוף ערעורים.</p>
				<p>כמו שאלה על "הגורם הסיכון המשמעותי ביותר למחלה פריודונטלית היינה ?" הוסיפו לשאלה אחרי ערעורים את התשובה "הגיינה אורלית" כתשובה נכונה חוץ מ- "עישון". כלומר כל מי שסימן הגיינה אורלית גם קיבל נקודות. וחוץ מזה השאלה מוזרה ופתוחה לויכוח.</p>
				<p> למשל השאלה על שחרור מושהה - "מה האנטיביוטיקה שניתנת בשביל שחרור מושהה ? |או| איזה אנטיביוטיקה מופיעה בתכשיר מקומי לשחרור מושהה ? " - יש שתי תשובות נכונות metronidazole ו- Minocycline. </p>
				<p> במבחן האחרון יש שתי תשובות או 3 שבטלו ( 2015פברואר ). ועוד שאלות שהוסיפו להם תשובה מהאופציות הקיימות כתשובה נכונה.</p>
				<p>דוגמא אחרונה היא על שאלה טטראצקלין. התשובה "חודר לפריזמות האמייל ודנטין" נכונה !". שאלה זו התבטלה עקב ערעורים.</p>


				<p>לפי כך השימוש באתר הוא בהתאם. אין זמן לתקן את כל השאלות ולפעמים אין הסבר לתשובה או אין הגיון פשוט לזכור בעל"פ. נא לזכור שיש מקום לטעויות.</p>

				<!-- Attention about the examination -->
			</paper-dialog-scrollable>
			<div class="buttons">
				<!-- <paper-button dialog-dismiss>Cancel</paper-button> -->
				<paper-button dialog-confirm autofocus>הבנתי</paper-button>
			</div>
		</paper-dialog>

	</section>
	<!-- END Attention about the examination -->

	<!-- toggle collapsed iron-collapse-->
	<section onclick="clickHandlerCollapse(event)" style="text-align:center;direction: rtl;">
		<paper-button data-collapse="ironcollapse" align="center" style="margin:auto;direction: rtl; margin-bottom:10px;margin-top:10px;">Open/Close (Toggle) Collapsed Questions</paper-button>
	</section>



<?php
//counter for collapsable sections.
$count = 1;
$unique_order = $examination_id . $count;
print $examination_content;


// $count = 1; DO not reset the count variable in the second loop to allow unique "collapseid" variables.
// The Loop...
while ($queryObjects['main']->have_posts()) : $queryObjects['main']->the_post();
			include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
      $studyfield = strip_tags(get_the_term_list( $id, 'studyfield', '', ', ', '' ));
			if(is_user_logged_in()) { $isopened = 'true'; } else { $isopened = 'false'; }

      ?>
      <?php
			$date = '';
      $dateisequal = false;
			$examinations = get_field('examination');
			foreach($examinations as $examination) {
        if ($examination_id == $examination->ID) {
          $dateisequal = true;
        }
				$date .= $examination->post_title. ' ';
			}
      ?>



		<?php if($dateisequal == true) { ?>
	            <mcq-listitem
	            style =" direction: rtl;"
	            titlebook="<?php echo $title; ?>"
	            field="<?php echo $date; ?>"
	            status="<?php echo $studyfield; ?>"
	            linkbook="<?php echo $permalink; ?>"
							image=""
							isopened="<?php echo $isopened; ?>"
	            collapseid="<?php echo 'collapse'.$unique_order; ?>"
	            >

		            	<div id="qstatus">
		           		<?php
									$questionstatus = get_field('questionstatus');

		                switch ($questionstatus) {
												case 'VV':
														echo '<iron-icon icon="icons:done-all" item-icon style="color: green;"></iron-icon>';
														break;
		                    case 'V':
		                        echo '<i class="fa fa-check" style="color: Green;"></i>';
		                        break;
		                    case 'Exclamation':
		                        echo '<i class="fa fa-exclamation" style="color: Orange;"></i>';
		                        break;
		                    case 'X':
		                        echo '<i class="fa fa-times" style="color: Red;"></i>';
		                        break;
	                }
	                ?>
	                </div>

									<div id="is_image" style="  margin: auto;">
										<?php if($images) { ?>
										<div class="docs-homescreen-list-item-cell docs-homescreen-list-item-image" aria-label="image" style="  text-align: center;  display: block; min-width:24px;"><iron-icon icon="image:panorama" style="height: 46px;"></iron-icon></div>
										<?php } ?>
									</div>


		            	<div id="qcontent">
		                	<?php include( \SZN\App::getFileDirectoryPath('templates','mcq-archive-content.template.php') ); ?>
		            	</div>

	            </mcq-listitem>
			<?php } ?>

<?php
$count ++;
$unique_order = $examination_id . $count;
endwhile;

?>
