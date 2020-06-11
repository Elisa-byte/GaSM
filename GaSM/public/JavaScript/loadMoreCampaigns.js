$(document).ready(function() {

    // Load more data
    $('.load-more').click(function() {
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 4;
        row = row + rowperpage;

        if (row <= allcount) {
            $("#row").val(row);

            $.ajax({
                url: 'campanie/moreCampaigns',
                type: 'post',
                data: { row: row },
                beforeSend: function() {
                    $(".load-more").text("Loading...");
                },
                success: function(response) {

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $(".campanie__preview:last").after(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if (rowno > allcount) {

                            // Change the text and background
                            $('.load-more').text("Hide");
                        } else {
                            $(".load-more").text("Load more");
                        }
                    }, 1000);

                }
            });
        } else {
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.campanie__preview:nth-child(3)').nextAll('.campanie__preview').remove();

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");

            }, 1000);


        }

    });

});