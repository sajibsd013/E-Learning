let element = document.getElementsByTagName("body")[0];
element.setAttribute("id", "root");
var root = "/e-learning";


const ChartConfigData = (labels, data, bgcolor, type) => {
    var ChartConfig = {
        type: type,
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Blog Article',
                    backgroundColor: bgcolor,
                    borderColor: "rgba(117,193,129, 0.8)",
                    data: data,
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }]
            },
            legend: {
                display: true
            }
        }
    };
    return ChartConfig;
}


const loadCharts = () => {
    const Url = `${root}/admin/config/_get_chart_data.php`;
    var Dataset;
    let labels = [];
    let data = [];
    let req = new XMLHttpRequest();
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            const response = req.responseText;
            Dataset = JSON.parse(response);
            for (x in Dataset) {
                labels.push(x);
                data.push(Dataset[x]);
            }
            const LinebackgroundColor = ["rgba(117,193,129,0.2)"];
            const lineChartConfig = ChartConfigData(labels, data, LinebackgroundColor, "line");
            if (document.getElementById('chart-line')) {
                var lineChart = document.getElementById('chart-line').getContext('2d');
                var newChart = new Chart(lineChart, lineChartConfig);
            }

            const BarbackgroundColor = "#20c997";

            const barChartConfig = ChartConfigData(labels, data, BarbackgroundColor, "bar");
            if (document.getElementById('chart-bar')) {
                var barChart = document.getElementById('chart-bar').getContext('2d');
                var newChart = new Chart(barChart, barChartConfig);
            }

        }
    }



}

window.addEventListener('load', function () {
    loadCharts();
});




// Reload
const Reload = () => {
    let currentURL = window.location.href;
    if (currentURL.includes("login") || currentURL.includes("registration") || currentURL.includes("activate")) {
        if (sessionStorage.getItem("loggedin") == "true") {
            currentURL = `${root}/`;
            window.history.pushState({
                id: "",
                source: "JS",
            }, "Router", currentURL)
        }
    }

    let req = new XMLHttpRequest();
    req.open('GET', `${currentURL}`, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('root').innerHTML = req.responseText;
            loadCharts();
        }
    }
}

//GET

const getFunc = (Url) => {
    let req = new XMLHttpRequest();
    var response;
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            let res = response;
            try {
                res = JSON.parse(response);
            } catch (error) {
            }
            if (res.status) {
                // console.log(res.path);
                redirectTo(`${root}${res.path}`);
            }
            else if (res == "back") {
                history.back();
            }
            else if (res == "reload") {
                Reload();
            }

            // if (response == 1 || response == 'reload') {
            //     Reload();
            // }
            // else if (response == 2) {
            //     redirectTo(`/E-Learning/blog/`);
            // }
            // else if (response == 'redirect-home') {
            //     redirectTo(`${root}`);
            // }
            // else {
            //     console.log(response);
            // }
        }

    }
}



// Routhing
const redirectTo = (pageURL) => {
    let req = new XMLHttpRequest();
    req.open('GET', `${pageURL}`, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('root').innerHTML = req.responseText;
            loadCharts();
            window.history.pushState({
                id: "",
                source: "JS",
            }, "Router", pageURL)
        }
    }


}

// Window Back  
window.onpopstate = () => {
    Reload();
}

// Message Fuc
const messageFunc = (response, submit) => {
    let submit_btn = document.getElementById(submit);
    let alert_div = document.getElementById('alert');
    let mgs_span = document.getElementById('msg');
    submit_btn.disabled = true;
    alert_div.classList.remove('d-none');
    mgs_span.innerHTML = response;

    setTimeout(() => {
        alert_div.classList.add('d-none');
        mgs_span.innerHTML = "";
        submit_btn.disabled = false;
    }, 5000);

}




const getFormData = (data) => {
    let form_element = document.getElementsByClassName(data);
    let form_data = new FormData();
    for (let i = 0; i < form_element.length; i++) {
        form_data.append(form_element[i].name, form_element[i].value);
    }
    return form_data;
}


const submitForm = (e, url) => {
    e.preventDefault();

    let response = 0;

    let req = new XMLHttpRequest();
    let form_data = getFormData("_form_data");

    req.open('POST', url, true);
    req.send(form_data);

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            // console.log(response);
            let res = response;
            try {
                res = JSON.parse(response);
            } catch (error) {
            }

            if (res.status) {
                console.log(res);
                redirectTo(`${root}${res.path}`);
            }
            else if (res == "back") {
                history.back();
            }
            else if (res == "reload") {
                Reload();
            }
            else {
                messageFunc(res, "submit");
            }

            // if (response == 1) {
            //     redirectTo(`${root}/auth/activate/`);
            // } else if (response == 2) {
            //     redirectTo(`${root}/auth/login/`);
            // } else if (response == 3 || response=="reload") {
            //     Reload();
            // } else if (response == 4) {
            //     history.back();
            // } else if (response == 5) {
            //     redirectTo(`${root}/auth/recover/recover.php`);
            // } else if (response == 6) {
            //     redirectTo(`${root}/courses/cart.php`);
            // } 
            // else if (response == 7) {
            //     redirectTo(`${root}/blog/`);
            // } 
            // else if (response == 'course-dashboard') {
            //     redirectTo(`${root}/dashboard/courses/`);
            // } 

        }

    }
}



const addModerator = (email) => {
    const Url = `/E-learning/dashboard/config/_addmod.php?email=${email}`;
    let req = new XMLHttpRequest();
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            const response = req.responseText;
            data = JSON.parse(response);
            const username = document.getElementById('username');
            const UserID = document.getElementById('UserID');
            const submit_btn = document.getElementById('submit');

            if (data) {
                console.log(data);
                username.value = data.username;
                UserID.value = data.UserID;
                username.style.display = 'block';
            } else {
                username.value = '';
                UserID.value = '';
                username.style.display = 'none';

            }

        }

    }
}

// Change Profile
const updateProfile = (e) => {
    e.preventDefault();

    let response = 0;
    let req = new XMLHttpRequest();

    let form_data = getFormData("_profile_data");

    req.open('POST', `${root}/settings/config/_update_profile.php`, true);
    req.send(form_data);

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            console.log(response);
            if (response == "success") {
                messageFunc("Profile updated successfully", "update_profile");
            }
        }
    }
}



// Subcribe 
const subcribeFuc = (e) => {
    e.preventDefault();
    let email = document.getElementById("subcribemail").value;
    let req = new XMLHttpRequest();
    req.open('get', `/E-Learning/config/_subcriber.php?email=${email}`, true);
    req.send();
    var response;
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            messageFunc(response, "subcribe");

        }
    }
}


const inactiveAcc = () => {
    let email = document.getElementById("loginEmail").value;
    let req1 = new XMLHttpRequest();
    req1.open('get', `/E-Learning/auth/login/_inactivate.php?email=${email}`, true);
    req1.send();
    req1.onreadystatechange = () => {
        if (req1.readyState == 4 && req1.status == 200) {
            // messageFunc("Soory.. You need to confirm your account!","submit");
        }
    }
}


//Login User
const onSubmitLoginForm = (e) => {
    e.preventDefault();

    let response = 0;
    let form_element = document.getElementsByClassName("_form_data");
    let form_data = new FormData();

    for (let i = 0; i < form_element.length; i++) {
        form_data.append(form_element[i].name, form_element[i].value);
    }

    let req = new XMLHttpRequest();
    req.open('POST', '/E-Learning/auth/login/_login.php', true);
    req.send(form_data);
    let attempt = 0;

    let alert_div2 = document.getElementById('alert_div2');
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            if (response != 1 && response != 2) {
                if (!alert_div2.classList.contains("d-none")) {
                    alert_div2.classList.add("d-none");
                }
            }
            if (response == 1) {
                if (sessionStorage.getItem("attempt")) {
                    attempt = 0;
                    sessionStorage.setItem("attempt", attempt);
                }
                const pageURL = "/E-Learning/";
                redirectTo(pageURL);

            }
            else if (response == 2) {
                alert_div2.classList.remove("d-none");
            }
            else if (response == 3) {
                if (sessionStorage.getItem("attempt")) {
                    attempt = parseInt(sessionStorage.getItem("attempt")) + 1;
                    sessionStorage.setItem("attempt", attempt);
                }
                else {
                    attempt = 1;
                    sessionStorage.setItem("attempt", attempt);
                }
                if (attempt >= 3) {
                    sessionStorage.setItem("attempt", 0);
                    inactiveAcc();
                    alert_div2.classList.remove("d-none");
                }
                else {
                    messageFunc(`Password incorrect! You have ${3 - attempt} more attempts `, "submit");
                }
            }
            else {
                messageFunc(response, "submit");

            }
        }

    }
}

// logout
const logout = () => {
    let response = 0;
    let req = new XMLHttpRequest();
    req.open('GET', '/E-Learning/auth/logout', true);
    req.send();

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            if (response == 1) {
                sessionStorage.setItem("loggedin", false);
                const pageURL = "/E-Learning/";
                redirectTo(pageURL);
            }
        }
    }
}






// Recover Password 
const recoverPass = (e) => {
    e.preventDefault();
    let response = 0;

    let OTP_CODE = document.getElementById("OTP").value;
    let req = new XMLHttpRequest();
    req.open('get', `/E-Learning/auth/recover/_recover.php?otp=${OTP_CODE}`, true);
    req.send();

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            if (response != 1) {
                messageFunc(response, "submit");
            }
        }
        if (response == 1) {
            redirectTo('/E-Learning/auth/recover/recover.php');
        }
    }
}




//Update 
const update = (update) => {
    let response = 0;
    let form_element = document.getElementsByClassName(update);
    let form_data = new FormData();
    for (let i = 0; i < form_element.length; i++) {
        form_data.append(form_element[i].name, form_element[i].value);
    }
    let req = new XMLHttpRequest();
    req.open('POST', '/E-Learning/blog/config/_update.php', true);
    req.send(form_data);
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
        }
        if (response == 1) {
            history.back();
        }

    }
}


const updateComment = (e) => {
    e.preventDefault();
    update("_comment_data");
}

const updateReply = (e) => {
    e.preventDefault();
    update("_reply_data");
}
const updatePost = (e) => {
    e.preventDefault();
    update("_blog_data");
}



const postReply = (e, CommentID, BlogID) => {
    e.preventDefault();
    let response = 0;
    let comment_content = document.getElementById(`reply${CommentID}`);
    let form_data = new FormData();

    form_data.append("BlogID", BlogID);
    form_data.append("CommentID", CommentID);
    form_data.append("reply", comment_content.value);

    let req = new XMLHttpRequest();
    req.open('POST', '/E-Learning/blog/config/_post_reply.php', true);
    req.send(form_data);
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
        }
        if (response == 1) {
            Reload();
        }
    }

}

const postPrivateReply = (e, CommentID) => {
    e.preventDefault();
    let response = 0;
    let comment_content = document.getElementById(`reply${CommentID}`);
    let form_data = new FormData();

    form_data.append("CommentID", CommentID);
    form_data.append("reply", comment_content.value);

    let req = new XMLHttpRequest();
    req.open('POST', '/E-Learning/courses/config/_post_reply.php', true);
    req.send(form_data);
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
        }
        if (response == 1) {
            Reload();
        }
    }

}



// 


// Navigation 
const SideMenuOpenClose = () => {
    let SideNavID = document.getElementById("SideNavID");

    if (SideNavID.classList.contains('NavOpen')) {
        SideNavID.classList.remove('NavOpen');
        SideNavID.classList.add('NavClose');

    } else {
        SideNavID.classList.remove('NavClose');
        SideNavID.classList.add('NavOpen');

    }
}

//displayForm
const displayForm = (CommentID) => {
    let reply_form = "reply_form" + CommentID;
    let form = document.getElementById(reply_form);
    form.style.display = "block";
}


//

let postApprove = (BlogID, value) => {
    const url = `/E-learning/admin/config/_approve.php?BlogID=${BlogID}&checkbox=${value.checked}`;
    getFunc(url);
}

//GET

const setPoints = (Url) => {
    let req = new XMLHttpRequest();
    var response;
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            document.getElementById("points").innerHTML = response;
        }

    }
}



const quizForm = (e) => {
    e.preventDefault();
    const count = document.getElementById('count').value;
    const LessonID = document.getElementById('LessonID').value;
    let point = 0;
    const url_sget_atmp = `/E-learning/courses/config/_config.php?lsn_get_atm=${LessonID}`;

    let req = new XMLHttpRequest();
    req.open('GET', url_sget_atmp, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            const res = req.response;
            console.log(res);
            if (res == 0) {
                const url_setatmp = `/E-learning/courses/config/_config.php?lsn_set_atm=${LessonID}`;
                getFunc(url_setatmp);
                for (let i = 1; i <= count; i++) {
                    const radio_class = `_form_data${i}`;
                    let ans = document.getElementById(`ans${i}`).value;
                    let alert_id = document.getElementById(`alert${i}`);
                    let form_element = document.getElementsByClassName(radio_class);
                    for (let j = 0; j < form_element.length; j++) {
                        const value = form_element[j].value;
                        const checked = form_element[j].checked;
                        if (checked) {
                            alert_id.classList.remove('d-none')
                            if (ans == value) {
                                alert_id.classList.add('alert-success')
                                point += 3;

                            } else {
                                alert_id.classList.add('alert-danger')

                            }
                        }
                    }
                }
                const CourseID = document.getElementById('CourseID').value;
                const url_point = `/E-learning/courses/config/_config.php?points=${point}&CourseID=${CourseID}`;
                setPoints(url_point);

                const next_LessonID = document.getElementById('next_LessonID').value;
                const url_unlocklsn = `/E-learning/courses/config/_config.php?unlock_next=${next_LessonID}`;
                getFunc(url_unlocklsn);

            } else {

                for (let i = 1; i <= count; i++) {
                    const radio_class = `_form_data${i}`;
                    let ans = document.getElementById(`ans${i}`).value;
                    let alert_id = document.getElementById(`alert${i}`);
                    let form_element = document.getElementsByClassName(radio_class);
                    for (let j = 0; j < form_element.length; j++) {
                        const value = form_element[j].value;
                        const checked = form_element[j].checked;
                        if (checked) {
                            alert_id.classList.remove('d-none')
                            if (ans == value) {
                                alert_id.classList.add('alert-success')
                            } else {
                                alert_id.classList.add('alert-danger')
                            }
                        }
                    }

                }



            }
        }

    }



    document.getElementById('submit').disabled = true;
    document.getElementById('next_lsn').disabled = false;

}


const setQuizAns = (e) => {
    const s_value = e.value;

    const ans = document.getElementById(s_value).value;
    if (ans) {
        document.getElementById('ans').value = ans;
        document.getElementById("alert2").style.display = "none";
    } else {
        document.getElementById("alert2").style.display = "block";
        document.getElementById('ans').value = "NULL";

    }
}



const setSearchOption = (e) => {
    const value = e.value;
    const Url = `/e-learning/config/_search.php?q=${value}`;

    let req = new XMLHttpRequest();
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            console.log(req.response)
            document.getElementById('search_option').innerHTML = req.response;
        }
    }


}

