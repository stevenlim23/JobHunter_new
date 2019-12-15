$(document).ready(function() {

    function addRemoveClass(theRows) {

        theRows.removeClass("odd even");
        theRows.filter(":odd").addClass("odd");
        theRows.filter(":even").addClass("even");
    }

    var rows = $("table#myTable tr:not(:first-child)");

    addRemoveClass(rows);


    $("#selectField").on("change", function() {

        var selected = this.value;

        if (selected != "All") {

            rows.filter("[year=" + selected + "]").show();
            rows.not("[year=" + selected + "]").hide();
            var visibleRows = rows.filter("[year=" + selected + "]");
            addRemoveClass(visibleRows);
        } else {

            rows.show();
            addRemoveClass(rows);

        } 

    });

    
});