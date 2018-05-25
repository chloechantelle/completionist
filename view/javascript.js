$(document).ready(function(){

    // materialize

    $('.modal').modal();
    $('select').formSelect();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    $('.carousel').carousel();
    $('.dropdown-trigger').dropdown();
    
    // material datepicker
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        defaultDate: '5/05/2018',
        setDefaultDate: true,
    });           

    // remember checkbox state into localStorage        

    var formValues = JSON.parse(localStorage.getItem('formValues')) || {};
    var $checkboxes = $("#checkbox-container :checkbox");
    var $button = $("#checkbox-container button");

    function allChecked(){
        return $checkboxes.length === $checkboxes.filter(":checked").length;
    }

    function updateButtonStatus(){
        $button.text(allChecked()? "Uncheck all" : "Check all");
    }

    function handleButtonClick(){
        $checkboxes.prop("checked", allChecked()? false : true)
    }

    function updateStorage(){
        $checkboxes.each(function(){
            formValues[this.id] = this.checked;
        });

        formValues["buttonText"] = $button.text();
        localStorage.setItem("formValues", JSON.stringify(formValues));
    }

    $button.on("click", function() {
        handleButtonClick();
        updateButtonStatus();
        updateStorage();
    });

    $checkboxes.on("change", function(){
        updateButtonStatus();
        updateStorage();
    });

    // On page load
    $.each(formValues, function(key, value) {
        $("#" + key).prop('checked', value);
    });
    $button.text(formValues["buttonText"]);

});

// debug switch style
function buttonfunction() {
    settingsbutt.style.pointerEvents = "auto";
    settingsbutt.style.cursor = "pointer";
    settingsbutt.style.opacity = "0.8";
}

// validation
$(function() {
    $("form[name='registration']").validate({
        rules: {
            Date: "required",
            PaymentAmount: "required",
            TimeGiven: {
                required: true
            },
            Status: {
                required: true
            }
        },
        messages: {
            Date: "Please enter valid date",
            Status: "Please enter valid status",
            PaymentAmount: "Please enter valid amount",
            TimeGiven: {
                required: "Please enter valid time"
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});

// test beep
console.log("beep");

// hide login then show register modal
function register() {
    $('#login').modal();
    $('#register').modal();
};

// show login modal
function login() {
    $('#login').modal();
};
