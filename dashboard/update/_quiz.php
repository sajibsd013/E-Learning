<?php
$db = new DB();
$sql2 = "SELECT * FROM `quizzes` WHERE `QuizID`='$QuizID'";
$row = $db->getRow($sql2);
$action_url = $root.'/dashboard/config/_update.php';
$db->close();
?>

<div class="container">
    <div class="row justify-content-center g-3 my-2 ">
        <div class="col-lg-9 col-md-10  bg-white shadow-lg rounded p-4">
            <h5 class="heading_color mb-4">Uodate Quiz!</h5>

            <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                <div class="form-floating  text-muted">
                    <input type="text" class="form-control _form_data" id="ques" name="ques" placeholder=" " value="<?php echo $row['ques'] ?>" required>
                    <label for="ques">Enter Question </label>
                </div>
                <div class="row g-2 my-2">
                    <div class="col-md-6">
                        <div class="form-floating  text-muted">
                            <input type="text" class="form-control _form_data" id="a" name="a" placeholder=" " value="<?php echo $row['a'] ?>" required>
                            <label for="a">Option 1 </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  text-muted">
                            <input type="text" class="form-control _form_data" id="b" name="b" placeholder=" " value="<?php echo $row['b'] ?>" required>
                            <label for="b">Option 2 </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  text-muted">
                            <input type="text" class="form-control _form_data" id="c" name="c" placeholder=" " value="<?php echo $row['c'] ?>" required>
                            <label for="c">Option 3 </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating  text-muted">
                            <input type="text" class="form-control _form_data" id="d" name="d" placeholder=" " value="<?php echo $row['d'] ?>" required>
                            <label for="d">Option 4 </label>
                        </div>
                    </div>

                </div>
                <div class="form-group  text-muted">
                    <label for="s_ans">Select Answer</label>
                    <div id="alert2" class="alert alert-danger py-1 text-center mt-3" style="display: none;" role="alert">
                        <p class="small h6 my-0 py-1">Please fill all options then select answer</p>
                    </div>
                    <select name="s_ans" id="s_ans" class="form-select mt-1" onchange="setQuizAns(this)">
                        <option selected disabled>Select Answer</option>
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>d</option>
                    </select>
                </div>
                <div class="form-floating text-muted my-2">
                    <input type="text" name="ans" id="ans" value="<?php echo $row['ans'] ?>" class="_form_data form-control bg-white border-0" disabled>
                    <label for="ans">Answer: </label>

                </div>
                <input type="text" name="QuizID" id="QuizID" value="<?php echo $row['QuizID']  ?>" class="_form_data d-none  mt-1">
                <button type="submit" id="submit" class="btn btn-sm btn-outline-dark my-3 w-100 fw-bold">Update Quiz</button>
            </form>

        </div>
    </div>
</div>