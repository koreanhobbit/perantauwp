<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    //form for contacting administrator
    msform();
    //multiple steps form
    function msform() {
        var totalsteps = 0;
        var currentstep = 1;
        $('.msform').find('.tab').each(function(index, value) {
            position = index + 1;
            $(this).attr('data-pos', position);
            $(this).addClass('tab' + position);
            totalsteps = totalsteps + 1;
        });

        $('.nextBtn').click(function() {
            $('.msform').find('.tab').each(function(index, value) {
                if(!$(this).hasClass('hidden')) {
                    nextstep = index + 2;
                    target = '.tab' + nextstep;
                    $(target).removeClass('hidden');
                    $(this).addClass('hidden');

                    //change the progress bar
                    var barprogress = (nextstep/totalsteps)*100;
                    $('#msformbar').prop('style', 'width:' + barprogress + '%');
                    $('#msformbar').text(barprogress + '% Complete');

                    if(nextstep < totalsteps) {
                        if($('.prevBtn').hasClass('hidden')) {
                            $('.prevBtn').removeClass('hidden');
                        }
                    }

                    if(nextstep == totalsteps) {
                        $('.nextBtn').addClass('hidden');
                        $('.submitBtn').removeClass('hidden');
                        if($('.prevBtn').hasClass('hidden')) {
                            $('.prevBtn').removeClass('hidden');
                        }
                    }

                    return false;
                }  
            });
        });

        $('.prevBtn').click(function() {
            $('.msform').find('.tab').each(function(index, value) {
                if(!$(this).hasClass('hidden')) {
                    prevstep = index;
                    target = '.tab' + prevstep;
                    $(target).removeClass('hidden');
                    $(this).addClass('hidden');

                    //change the progress bar
                    var barprogress = (prevstep/totalsteps)*100;
                    $('#msformbar').prop('style', 'width:' + barprogress + '%');
                    $('#msformbar').text(barprogress + '% Complete');

                    if(prevstep > 1) {
                        if($('.nextBtn').hasClass('hidden')) {
                            $('.nextBtn').removeClass('hidden');
                        }
                        if(!$('.submitBtn').hasClass('hidden')) {
                            $('.submitBtn').addClass('hidden');
                        }
                    }

                    if(prevstep == 1) {
                        $('.prevBtn').addClass('hidden');
                        if($('.nextBtn').hasClass('hidden')) {
                            $('.nextBtn').removeClass('hidden');
                        }
                        if(!$('.submitBtn'.hasClass('hidden'))) {
                            $('.submitBtn').addClass('hidden');
                        }
                    }
                }
            });
        });

        var progress = (1/totalsteps)*100;

        //set the progress bar
        $('#msformbar').prop('style', 'width:' + progress + '%');
        $('#msformbar').text(progress + '% Complete');

        //set date picker for msform
        //set date picker for arrival date anda departure date
        $('#msformarrival').datepicker({
            autoclose: true,
        });

        $return = $('#msformarrival').datepicker('getDate');

        $('#msformreturn').datepicker({
            autoclose: true,
        });

        //set limit for return date
        $('#msformarrival').on('change', function() {
            $('#msformreturn').datepicker('setStartDate', $(this).val());
        });

        @if(session('message'))
            $('.container-other').addClass('hidden');
            $('.success-message').removeClass('hidden');
        @endif
    }
</script>