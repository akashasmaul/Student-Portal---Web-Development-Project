<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gradeulator</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
        <style>

        .center {
          display: flex;
          justify-content: center;
          align-items: center;
        }

        </style>
    </head>
  <body>

 
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
                                <h1 class="title is-size-3 has-text-black" id="grade_head">Your average grade is...</h1>
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

                                <h1 class="title is-size-5 has-text-black">Enter your grades here.</h1>
                                <h1 class="subtitle is-size-6 has-text-gray">
                                    grades in the left (blue) column, weights in the right (red) column
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



    <script src="gradecalc.js"></script>
  </body>
</html>