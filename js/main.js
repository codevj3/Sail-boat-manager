//click on edit button of entries table
function edit(row) {
    console.log(row);
    $.ajax({
        url: './edit_entry.php',
        type: "POST",
        data: {searchData: row},
        dataType: "JSON",
        success: function (response) {
            //will show update form on page
            $("#updateHolder").show();
            console.log(response);
            var firstName = $("#firstName");
            var lastName = $("#lastName");
            var boatType = $("#boatType");
            var boatMotor = $("#boatMotor");
            var boatLength = $("#boatLength");
            var boatBuilt = $("#boatBuilt");
            var boatPayment = $("#boatPayment");
            var page = $("#page");
            var id = $("#id");
            id.val(row);
            firstName.val(response.firstName);
            lastName.val(response.lastName);
            boatType.val(response.boatType);
            boatMotor.val(response.boatMotor);
            boatLength.val(response.boatLength);
            boatBuilt.val(response.boatBuilt);
            boatPayment.val(response.boatPayment);
            page.val(response.page);

        },
        error: function (error, status) {
            console.log(error);
            console.log(status);
        }
    });
}
//when delete button is clicked on home page
function remove(row) {
    console.log(row);
    $.ajax({
        url: './delete_entry.php',
        type: "POST",
        data: {searchData: row},
        success: function (response) {
            alert("Record Deleted Successfully");
            console.log(response);
            fetchAllRecords();
        },
        error: function (error, status) {
            console.log(error);
            console.log(status);
        }
    });
}
//It will fetch out all the entries form array
function fetchAllRecords() {
    var row = "";
    $.ajax({
        url: './fetch_entry.php',
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            if (response.length > 0) {
                $("#boatList tbody").empty();
                for (var i = 0; i < Object.keys(response).length; i++) {
                    row = row + "<tr>" +
                            "<td>" + response[i].firstName + "</td>" +
                            "<td>" + response[i].lastName + "</td>" +
                            "<td>" + response[i].boatType + "</td>" +
                            "<td>" + response[i].boatMotor + "</td>" +
                            "<td>" + response[i].boatLength + "</td>" +
                            "<td>" + response[i].boatBuilt + "</td>" +
                            "<td>" + response[i].boatPayment + "</td>" +
                            "<td>" + response[i].page + "</td>" +
                            "<td>" + "<button type='button' class='btn-info' onclick='edit(" + i + ")'>Edit</button>" + "</td>" +
                            "<td>" + "<button type='button' class='btn-danger' onclick='remove(" + i + ")'>Delete</button>" + "</td>" +
                            "<tr>";
                }
                $("#boatList").show();
                $("#boatList tbody").append(row);
            }
            else {
                alert("No Records Found.");
            }
        },
        error: function (error, status) {
            console.log(error);
            console.log(status);
        }
    });
}
//start when doccument is completely loaded
jQuery(function ($) {
    'use strict';
    //it will hide the table holding array entries
    $("#boatList").hide();
    //it will hide the update form
    $("#updateHolder").hide();
    var searchName = $("#searchName");
    var submitDetail = $("#submitDetail");
    var firstName = $("#firstName");
    var lastName = $("#lastName");
    var boatType = $("#boatType");
    var boatPayment = $("#boatPayment");
    var page = $("#page");
    var boatMotor = $("#boatMotor");
    var boatLength = $("#boatLength");
    var boatBuilt = $("#boatBuilt");
    var updateDetail = $("#updateDetail");
    var id = $("#id");
    //it will check if user has not filled mandatory inputs
    function checkEmpty() {
        var hasBlank = false;
        if (firstName.val().length < 1) {
            firstName.addClass("hasError");
            hasBlank = true;
        }
        if (lastName.val().length < 1) {
            lastName.addClass("hasError");
            hasBlank = true;
        }
        if (boatType.text().length < 1) {
            boatType.addClass("hasError");
            hasBlank = true;
        }

        if (boatMotor.val().length < 1) {
            boatMotor.addClass("hasError");
            hasBlank = true;
        }

        if (boatLength.val().length < 1) {
            boatLength.addClass("hasError");
            hasBlank = true;
        }

        if (boatBuilt.val().length < 1) {
            boatBuilt.addClass("hasError");
            hasBlank = true;
        }
        return hasBlank;
    }
    //it will remove error notification
    function removeError() {
        firstName.removeClass("hasError");
        lastName.removeClass("hasError");
        boatType.removeClass("hasError");
        boatMotor.removeClass("hasError");
        boatLength.removeClass("hasError");
        boatBuilt.removeClass("hasError");
    }
    //when we input in search box of home
    searchName.keyup(function () {
        $.ajax({
            url: './search_entry.php',
            type: "POST",
            data: {searchData: $(this).val()},
            dataType: "JSON",
            success: function (response) {
                var row = "";
                $("#boatList tbody").empty();
                console.log(response);
                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        row = row + "<tr>" +
                                "<td>" + response[i].firstName + "</td>" +
                                "<td>" + response[i].lastName + "</td>" +
                                "<td>" + response[i].boatType + "</td>" +
                                "<td>" + response[i].boatMotor + "</td>" +
                                "<td>" + response[i].boatLength + "</td>" +
                                "<td>" + response[i].boatBuilt + "</td>" +
                                "<td>" + response[i].boatPayment + "</td>" +
                                "<td>" + response[i].page + "</td>" +
                                "<td>" + "<button type='button' class='btn-info' onclick='edit(" + response[i].id + ")'>Edit</button>" + "</td>" +
                                "<td>" + "<button type='button' class='btn-danger' onclick='remove(" + response[i].id + ")'>Delete</button>" + "</td>" +
                                "<tr>";
                    }
                    $("#boatList").show();
                    $("#boatList tbody").append(row);
                }
                else {
                    alert("No Records Found.");
                }

            },
            error: function (error, status) {
                console.log(error);
                console.log(status);
            }
        });

    });
    //click on submit of update form of main home page
    updateDetail.click(function () {
        console.log("update");
        $("#updateHolder").hide();
        var postData = {};
        var hasBlank = checkEmpty();
        if (hasBlank) {
            alert("Remove errors first to submit form.");
            return false;
        } else {
            postData.id = id.val();
            postData.firstName = firstName.val();
            postData.lastName = lastName.val();
            postData.boatType = boatType.val()
            postData.boatMotor = boatMotor.val();
            postData.boatLength = boatLength.val();
            postData.boatBuilt = boatBuilt.val();
            postData.boatPayment = boatPayment.val();
            postData.page = page.val();
            console.log(postData);
            $.ajax({
                type: "POST",
                url: "./update_entry.php",
                data: postData,
                dataType: 'json',
                success: function (data, status) {
                    alert("Record Updated successfully");
                    console.log(data);
                    fetchAllRecords();
                    //refrsh records
                },
                error: function (data, status) {
                    console.log(data);
                    console.log("Data: " + data + "\nStatus: " + status);
                }
            });
        }

    });
    //click on submit of form of insert/add value/entry
    submitDetail.click(function () {
        var postData = {};
        var hasBlank = checkEmpty();
        if (hasBlank) {
            alert("Remove errors first to submit form.");
            return false;
        } else {
            postData.firstName = firstName.val();
            postData.lastName = lastName.val();
            postData.boatType = boatType.val();
            postData.boatMotor = boatMotor.val();
            postData.boatLength = boatLength.val();
            postData.boatBuilt = boatBuilt.val();
            postData.boatPayment = boatPayment.val();
            postData.page = page.val();
            console.log(postData);
            $.ajax({
                type: "POST",
                url: "./create_entry.php",
                data: postData,
                dataType: 'json',
                success: function (data, status) {
                    alert("Record Inserted successfully");
                    console.log(data);
                    console.log("Data: " + data + "\nStatus: " + status);
                },
                error: function (data, status) {
                    console.log(data);
                    console.log("Data: " + data + "\nStatus: " + status);
                }
            });
        }

    });
    firstName.click(function () {
        removeError();
    });
    lastName.click(function () {
        removeError();
    });
    boatType.click(function () {
        removeError();
    });
    boatMotor.click(function () {
        removeError();
    });
    boatLength.click(function () {
        removeError();
    });
    boatBuilt.click(function () {
        removeError();
    });

});

