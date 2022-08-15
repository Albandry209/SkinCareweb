<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar" >
    <head>
        <title> beauty face </title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href ="mystyle.css">
        <!-- This meta will render the width of the page at the width of the user screen -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- icon bar Library-->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Bootstrap code FROM W3SCHOOLS -->
        <style>
            .affix {
               top: 0;
               width: 99%;
               padding-top: 60px;
               z-index: 9999 !important; }

           .affix + .home{
               padding-top: 70px; }
       </style>

    </head>

    <body>
      <section class="home" >
        <div >
          <img id ="logo" src="loggo.png" width="250" height="110" alt= "logo" >
  <!-- Navigation  -->
          <nav >
            <div class="topnav">
              <a class="active" href="home111.html">الرئيسية</a>
              <a href="oilskin.html" > البشرة الدهنية </a>
              <a href="dryskin.html" > البشرة الجافة </a>
              <a href="comb.html" > البشرة المختلطة </a>
              <a href="logout.php"> خروج </a>
            </div>
          </nav>
            <!--End Of The Navigation Area -->
  </div>

    </section>

      <!-- Tab Content -->

    <div class="pho-content">
      <!--The Home Page-->
     <div id="home" class="tab-pane fade in active">
     </div>
    </div>
             <!--  Slideshow container Frmo W3schools-->

           <div class="slideshow-container">
  <div class="mySlides1">
    <img src="pho3.JPG"  alt="Face washed" style="width:100%" width="600" height="500">
  </div>

  <div class="mySlides1">
    <img src="pho4.JPG" alt="Face washed"  style="width:100%" width="600" height="500">
  </div>

  <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>



          <!-- Information to determine your skin type  -->
          <br><br>
          <section class="divs">
        <div class = "content ">
          <!-- code form tutorialPublic.com -->
        <h1>مرحبًا يا <b><?php echo htmlspecialchars($_SESSION["username"]); ?>
        </b> اتمنى لك جولة ممتعة في صفحتنا.</h1>

          <br>
    <h1 class="des"> لابد أن تعرفي عزيزتي المرأة نوع بشرتك لتقومي بالاهتمام بها حسب نوعها، لأن سوء اختيار المستحضر الملائم للبشرة قد يسبب لها الكثير من المشكلات  </h1>
     <p><strong> فما هي أنواع البشرة؟   </strong> أنواع البشرة هي :   الدهنية، الجافة، المركبة </p>
     <p> <strong> ١/ البشرة الدهنية:   </strong> إذا كانت البشرة زيتية، ناعمة ودائمة اللمعان، معرضة بشكل كبير لظهور البثور وحب الشباب والرؤوس السوداء </p>
     <p><strong> ٢/ البشرة الجافة:   </strong> بشرة رقيقة بمسام صغيرة وضيقة وعادةً ما تتعرض للتشقق والتقشر، والحساسية خاصةً في فصل الشتاء</p>
     <p><strong> ٣/ البشرة المركبة (المختلطة) :</strong >  البشرة المركبة واحدة من أصعب أنواع البشرة حيث يمكن أن تكون جافة ودهنية في مناطق أخرى، مثل منطقة (الأنف، الجبين والذقن)</p>
     <h3 class="des">إليك هذه الطريقة المضمونة لتحديد نوع بشرتك بدقة :</h3> <br>

     <p>اغسلي وجهك جيّداً باستخدام الماء وغسول الوجه ثمّ جففيه ، اتركي وجهك لمدة ساعة دون وضع أي كريم أو مكياج عليه بواسطة منديل ورقي ناعم اضغطي على جميع المناطق في وجهك</p>
     <h3 class="des">ثم تفحصي المنديل بدقة لتتبيني آثار تلك المناطق، وسوف تستطيعين تحديد نوع بشرتك حسب النتائج التالية: </h3>
     <p>  -إذا وجدت آثاراً للزيوت على المنديل فإن بشرتك دهنية .  </p>
     <p>  - أما إذا كانت بشرتك من النوع المركّب فسوف تقتصر آثار الدهون في الظهور على بعض المناطق كالأنف والجبين أمّا باقي المناطق كالذقن والخدود مثلاً فستجدينها جافة. </p>
     <p> - أما إن لم تجدي أيّة آثار للدهون على المنديل ولاحظت أنه جاف تماماً مع وجود القليل من القشور البيضاء دلالة على أن البشرة جافة </p>
     <h2> من خلال نوع بشرتك يمكنك إختيار المستحضرات المناسبة عن طريق الشريط في أعلى الصفحة  </h2>

     </div>
</section>

      <!-- footer -->
  <div class = "footer" >
     <h6> copyright reseved &copy; 2020 </h6>
  </div> <!--End Of Footer-->

  <!-- JavaScript CODES FROM W3SHOOLS -->
<!-- JS for  Automatic Slideshow -->
<script>
var slideIndex = [1,1];
var slideId = ["mySlides1", "mySlides2"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex[no]-1].style.display = "block";
}
</script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<!-- End of code -->

    </body>
</html>
