<?php /** @var Array $data */ ?>


<div class="text-box">
    <h1>Create account</h1>
    <p>scroll down</p>
    <div class="scroll-row">
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<div class="container">
    <div class="form-block">
        <div class="col-sm-4 offset-sm-4">
            <?php if($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <form method="post" action="?c=auth&a=createAccount">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Email</label>
                    <input type="email" class="form-control" name="mail" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" required>
                    <i class="fas fa-eye-slash" id="icon_inv" onclick="toggle_visibility()"></i>
                    <i class="fas fa-eye" id="icon_vis" onclick="toggle_visibility()"></i>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div id="message">
                    <h3>Password should contain:</h3>
                    <p id="lower_case" class="invalid">At least 1 lowercase letter</p>
                    <p id="upper_case" class="invalid">At least 1 uppercase letter</p>
                    <p id="number" class="invalid">At least 1 number</p>
                    <p id="length" class="invalid">At least 8 characters</p>
                </div>
                <script>
                    let myInput = document.getElementById("password");
                    let letter = document.getElementById("upper_case");
                    let capital = document.getElementById("lower_case");
                    let number = document.getElementById("number");
                    let length = document.getElementById("length");

                    myInput.onfocus = function() {
                        document.getElementById("message").style.visibility = "visible";
                    }

                    myInput.onblur = function() {
                        document.getElementById("message").style.visibility = "hidden";
                    }

                    myInput.onkeyup = function() {
                        const lowerCaseLetters = /[a-z]/g;
                        if(myInput.value.match(lowerCaseLetters)) {
                            letter.classList.remove("invalid");
                            letter.classList.add("valid");
                        } else {
                            letter.classList.remove("valid");
                            letter.classList.add("invalid");
                        }
                        const upperCaseLetters = /[A-Z]/g;
                        if(myInput.value.match(upperCaseLetters)) {
                            capital.classList.remove("invalid");
                            capital.classList.add("valid");
                        } else {
                            capital.classList.remove("valid");
                            capital.classList.add("invalid");
                        }
                        const numbers = /[0-9]/g;
                        if(myInput.value.match(numbers)) {
                            number.classList.remove("invalid");
                            number.classList.add("valid");
                        } else {
                            number.classList.remove("valid");
                            number.classList.add("invalid");
                        }
                        if(myInput.value.length >= 8) {
                            length.classList.remove("invalid");
                            length.classList.add("valid");
                        } else {
                            length.classList.remove("valid");
                            length.classList.add("invalid");
                        }
                    }

                    function toggle_visibility() {
                        document.getElementById("message").style.visibility = "visible";

                        let x = document.getElementById("password");
                        if (x.type === "password") {
                            x.type = "text";
                            document.getElementById("icon_inv").style.visibility = "visible"
                            document.getElementById("icon_vis").style.visibility = "hidden"
                        } else {
                            x.type = "password";
                            document.getElementById("icon_inv").style.visibility = "hidden"
                            document.getElementById("icon_vis").style.visibility = "visible"
                        }
                    }

                    setInterval(function(){

                    )
                    }, 1000);
                </script>
            </form>
        </div>
    </div>
</div>