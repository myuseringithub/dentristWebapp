<!-- Attention about the examination -->
  <section onclick="clickHandler(event)" style="text-align:center;direction: rtl;">

    <paper-button data-dialog="scrolling" align="center" style="margin:auto;direction: rtl; margin-bottom:10px;">חובה לקרוא !</paper-button>

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

<template is="dom-bind">
  <div class="middle">
    <paper-tabs class="bottom self-end" selected="{{selected}}" style=" background-color:#4285f4; color:white; -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.08); -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.08); box-shadow: 0 1px 3px rgba(0,0,0,0.08); border-radius: 3px;" >
      <paper-tab>All Questions</paper-tab>
      <?php
      while ($queryObjects['main']->have_posts()) : $queryObjects['main']->the_post();
      include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
      ?>
        <paper-tab><?php echo $title; ?></paper-tab>
      <?php
      endwhile;
      ?>
    </paper-tabs>
  </div>
  <div class="bottom" style="">
    <iron-pages selected="{{selected}}">
      <?php // echo SZN_template_processor('query-mcq-questionlist','archive-mcqlist', array('mobile','desktop','tablet')); ?>
      <div>
      <?php
      if( SZN\WPExtend\Visitor::checkPlatform(array('desktop', 'mobile', 'tablet')) ) {
        //Query = new Query();
        //$Query->saveMainQuery();
        //$Query->customQuery('mcq-questionlist.queryargs.php');
        //$Query->printQuery('mcq-list-archive.template.php');
        //$Query->resetMainQuery();
      }
      ?>
    </div>

      <?php

      // EXAMINATIONS QUERY
      while ($queryObjects['main']->have_posts()) : $queryObjects['main']->the_post();
        //check examination id or name to use later and match mcq presented.
        include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
        $examination_id = $id;
        $examination_title = $title;
        $examination_content = get_the_content('Read more');

        ?>
        <div>
          <?php // echo SZN_template_processor('query-examination-mcq-list','archive-examination-page-mcqlist', array('mobile','desktop','tablet'));
            echo $examination_title;
          ?>
        </div>
      <?php
      endwhile;
      ?>


    </iron-pages>
  </div>
</template>
<script>
  document.addEventListener('WebComponentsReady', function () {
    var template = document.querySelector('template[is="dom-bind"]');
    template.selected = 0; // selected is an index by default
  });
</script>
