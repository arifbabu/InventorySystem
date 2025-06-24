<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>

<script>
    $('#contactForm').submit(function () {
            if ($.trim($("#name").val()) === "") {
            alert('Name Empty!');
            $('input[type=text]').focus();
            return false;
        }
            if ($.trim($("#email").val()) === "") {
            alert('Email Empty!');
            $('input[type=email]').focus();
            return false;
        }
            if ($.trim($("#subject").val()) === "") {
            alert('Text Field Empty!');
            $('#subject').focus();
            return false;
        }

    });
    
    $('button').hide();

</script>
