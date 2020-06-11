console.log("ceva ceva in log!");

$(document).ready(function() {

    $('#dcsv').click(function() {
        var link = (window.location.href).split("?");
        console.log("ceva ceva in log!");
        var check = true;
        if (link.length > 1) {
            var data = link[1].split("=");
            if (data.length > 1) {
                if (isNaN(parseInt(data[1].substr(0, 4))))
                    check = false;
            } else check = false;
        } else check = false;

        if (!check) {
            $('#dcsv').text("Error");
            setTimeout(function() {

                $('#dcsv').text("Download Statistics(CSV)");
            }, 1000);
        }
    });

});

// $(document).ready(function() {

//     $('.dpdf').click(function() {
//         var link = (window.location.href).split("?");
//         var check = true;
//         if (link.length > 1) {
//             var data = link[1].split("=");
//             if (data.length > 1) {
//                 if (isNaN(parseInt(data[1].substr(0, 4))))
//                     check = false;
//             } else check = false;
//         } else check = false;

//         if (!check) {
//             $('.dpdf').text("Error");
//             setTimeout(function() {

//                 $('.dpdf').text("Download Statistics(CSV)");
//             }, 1000);
//         }
//     });

// });

// $(document).ready(function() {

//     $('.dhtml').click(function() {
//         var link = (window.location.href).split("?");
//         var check = true;
//         if (link.length > 1) {
//             var data = link[1].split("=");
//             if (data.length > 1) {
//                 if (isNaN(parseInt(data[1].substr(0, 4))))
//                     check = false;
//             } else check = false;
//         } else check = false;

//         if (!check) {
//             $('.dhtml').text("Error");
//             setTimeout(function() {

//                 $('.dhtml').text("Download Statistics(CSV)");
//             }, 1000);
//         }
//     });

// });