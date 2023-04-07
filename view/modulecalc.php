<! --
module calculator Page
% calculation from weighted marks
 --!>

<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
       
<body>
<!-- First sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="index.php" class="w3-bar-item w3-button nav-icons "> Dashbord</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons active"> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Study Tracking</h3>
  <a href="studydiary.php" class="w3-bar-item w3-button sector-heading  ">Study Diary</a> 
   <a href="mygrades.php" class="w3-bar-item w3-button sector-heading  ">My Grades    </a>  
   <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading active ">Grade Calculator</a>
   <div class="w3-bar-block sub-sector">
    <a href="modulecalc.php" class="w3-bar-item w3-button sub-subsector active">Module Calculator</a>
    <a href="yearcalc.php" class="w3-bar-item w3-button sub-subsector">Year Calculator </a>
    <a href="degreecalc.php" class="w3-bar-item w3-button sub-subsector">Undergraduate Degree Calculator</a>
  </div>
</div>
<!-- Page Content -->
<div style="margin-left:30%">

  
  <a href="portal.php" class="profile"> <?= $user['name'] ?></a>
  
   <!-- the grade section -->
   <section class="section">
        <div class="container" >
            <div class="columns ">

                <!-- first column (grade) -->
                <div class="column">
                    <article class="media notification has-background-white">
                        <figure class="media-left">
                        <span class="icon is-medium" style="color:rgb(228, 30, 185);">
                            <i class="far fa-2x fa-file-alt"></i></span>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <h1 class="title is-size-3 has-text-black" id="grade_head">Your average mark is...</h1>
                                <p class="title is-size-1 center has-text-gray" id="grade_final">0.00</p>
                                <p class="subtitle is size-2 center has-text-dark" id="grade_weight">with combined weight of 0.00</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- end of first (grade) column -->

                <!-- second column (grade entry) -->
                <div class="column is-two-thirds">
                    <article class="media notification has-background-white">
                        <figure class="media-left">
                        <span class="icon is-medium" style="color:rgb(255, 102, 0);">
                                <i class="fas fa-2x fa-bars"></i></span>
                        </figure>
                        <div class="media-content">
                            <div class="content">

                                <h1 class="title is-size-5 has-text-black">Enter your marks here.</h1>
                                <h1 class="subtitle is-size-6 has-text-gray">
                                    marks in the left (blue) column, weights in the right (red) column
                                    <br class="is-size-4"> tip: you can <strong><i>tab</i></strong> through the list.
                                </h1>

                                <div class="columns">

                                    <!-- the raw-grades column -->
                                    <div class="column">

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">1.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="e.g. 75">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="5">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">2.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">3.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">4.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">5.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">6.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">7.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">8.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">9.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                                <div class="field-label is-small">
                                                    <label class="label">10.</label>
                                                </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control is-expanded has-icons-left">
                                                        <input class="input is-rounded is-small is-primary"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="field">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input class="input is-small is-rounded is-danger"
                                                        onkeypress="return isNumberKey(event)" type="text" placeholder="...">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- calculator button -->
                                        <div class="field is-horizontal">
                                            <div class="field-label">
                                                <!-- left empty for spacing -->
                                            </div>
                                            <div class="field-body center">
                                                <div class="field">
                                                    <div class="control center">
                                                        <button class="button is-rounded is-medium is-success is-fullwidth" id="calculate_button" type="button" value="submit">
                                                            <span>Calculate</span>
                                                            <span class="icon is-small"><i class="fas fa-check"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- end of raw-grades column -->

                                </div>

                            </div>

                        </div>
                    </article>
                </div>
                <!-- end of second (grade-entry) column -->

            </div>
        </div>
    </section>
</div>

</div>
<script src="../js/gradecalc.js"></script>
</body>
</html>