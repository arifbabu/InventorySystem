<!-- jQuery -->
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- Bootstrap Toggle --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('backend')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend')}}/dist/js/pages/dashboard.js"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('backend')}}/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('backend')}}/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('backend')}}/plugins/flot/plugins/jquery.flot.pie.js"></script>

<script>
    $(function () {
        // Summernote
        $('#summernote').summernote({
            height: 1350,
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '85'],
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['style', ['style']],
                ['fontname', ['fontname']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            
        });

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai",
        });
    });

    $(function () {
        $('.toggle-class').change(function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var post_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('post.changeStatus')}}",
                data: {
                    'status': status,
                    'post_id': post_id
                },
                success: function (data) {
                    console.log(data.success)
                }
            });
        })
    })

</script>

<script>
    /**
     * Check all the permissions
     */
    $("#checkPermissionAll").click(function () {
        if ($(this).is(':checked')) {
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    function checkPermissionByGroup(className, checkThis) {
        const groupIdName = $("#" + checkThis.id);
        const classCheckBox = $('.' + className + ' input');

        if (groupIdName.is(':checked')) {
            classCheckBox.prop('checked', true);
        } else {
            classCheckBox.prop('checked', false);
        }
        implementAllChecked();
    }

    function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
        const classCheckbox = $('.' + groupClassName + ' input');
        const groupIDCheckBox = $("#" + groupID);

        // if there is any occurance where something is not selected then make selected = false
        if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
            groupIDCheckBox.prop('checked', true);
        } else {
            groupIDCheckBox.prop('checked', false);
        }
        implementAllChecked();
    }

    function implementAllChecked() {
        console.log("ok");
    }


    //  Mail checkbox selection


    $("#checkboxesMain").click(function () {
        if ($(this).is(':checked')) {
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });
    $('.checkbox').on('click', function () {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#checkboxesMain').prop('checked', true);
        } else {
            $('#checkboxesMain').prop('checked', false);
        }
    });

    $('.removeAll').on('click', function (e) {
        var userIdArr = [];
        $(".checkbox:checked").each(function () {
            userIdArr.push($(this).attr('data-id'));
        });
        if (userIdArr.length <= 0) {
            alert("Choose min one item to remove.");
        } else {
            if (confirm("Are you sure you want to delete")) {
                var stuId = userIdArr.join(",");
                $.ajax({
                    url: "{{url('delete-all')}}",
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + stuId,
                    success: function (data) {
                        if (data['status'] == true) {
                            $(".checkbox:checked").each(function () {
                                $(this).parents("tr").remove();
                            });
                            alert(data['message']);
                        } else {
                            alert('Error occured.');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
            }
        }
    });




    $('#show-user').on('click', function (e) {
        var postURL = $(this).data('url');
        $.get(postURL, function (data) {
            $('#postShowModal').modal('show');
            $('#post-id').text(data.id);
            $('#post-name').text(data.name);
            $('#post-description').text(data.description);
        })
    });
    

//     $('#myModal').on('shown.bs.modal', function() {
//   $('#summernote').summernote();
// });


// post JQuery Starts Here Below

    // post soft delete
    $('.post_delete').on('click', function (e) {
        e.preventDefault();
        const post_id = $(this).data('id');
        // alert(post_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('post.destroy')}}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    post_id: post_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });

    //  Permanent Delete post Alert Message Starts
    $('.permanentDeletepost').on('click', function (e) {
        e.preventDefault();
        const post_id = $(this).data('id');
        // alert(post_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('post.permanentDeletepost')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    post_id: post_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });
    //  Permanent Delete post Alert Message Ends

    // Restore  post Alert Message Starts
    $('.restorepost').on('click', function (e) {
        e.preventDefault();
        const post_id = $(this).data('id');
        // alert(post_id);
        if (confirm("Wanna Restore this??")) {
            $.ajax({
                url: "{{route('post.restorepost')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    post_id: post_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });
    //  Restore post Alert Message Ends

    // Category JS

    $('.category_delete').on('click', function (e) {
        e.preventDefault();
        const category_id = $(this).data('id');
        // alert(category_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('category.destroy')}}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category_id: category_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });


    // Email Delete 

        $('.email_delete').on('click', function (e) {
            e.preventDefault();
            const email_id = $(this).data('id');
            // alert(post_id);
            if (confirm("are you sure to delete??")) {
                $.ajax({
                    url: "{{route('mail.destroy')}}",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email_id: email_id
                    },
                    success: function (res) {
                        window.location.reload(); // Page reload after successfully deleted 
                    }
                });
            }
        });
        

        // User JQuery Starts Here

        // User soft delete
        $('.user_delete').on('click', function (e) {
        e.preventDefault();
        const user_id = $(this).data('id');
        // alert(post_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('users.destroy')}}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_id: user_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });
    
    // User Permanent delete 
    $('.permanentDeleteUser').on('click', function (e) {
        e.preventDefault();
        const user_id = $(this).data('id');
        // alert(post_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('user.permanentDeleteUser')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_id: user_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });

    // User Restore
    $('.restoreUser').on('click', function (e) {
        e.preventDefault();
        const user_id = $(this).data('id');
        // alert(post_id);
        if (confirm("Wanna Restore this??")) {
            $.ajax({
                url: "{{route('user.restoreUser')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_id: user_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });



        // ------------------- Role JQuery Starts Here

        // Role delete
        $('.role_delete').on('click', function (e) {
        e.preventDefault();
        const role_id = $(this).data('id');
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('roles.destroy')}}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    role_id: role_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });


    //------------------- Mail JQuery Starts Here
    
    // User Permanent delete 
    $('.permanentDeleteEmail').on('click', function (e) {
        e.preventDefault();
        const email_id = $(this).data('id');
        // alert(post_id);
        if (confirm("are you sure to delete??")) {
            $.ajax({
                url: "{{route('email.permanentDeleteEmail')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email_id: email_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });

    // Email Restore
    $('.restoreEmail').on('click', function (e) {
        e.preventDefault();
        const email_id = $(this).data('id');
        // alert(post_id);
        if (confirm("Wanna Restore this??")) {
            $.ajax({
                url: "{{route('email.restoreEmail')}}",
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email_id: email_id
                },
                success: function (res) {
                    window.location.reload(); // Page reload after successfully deleted 
                }
            });
        }
    });
</script>




{{-- Image Preview --}}
<script>
    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('preview');

      var reader = new FileReader();
      reader.onload = function () {
        preview.src = reader.result;
      };

      if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  <script>
    $(document).ready(function () {
      // Initially hide the field
      $('#hiddenField').hide();

      // Attach an event listener to the trigger input
      $('#triggerInput').on('input', function () {
        // Check the input value
        var inputValue = $(this).val();

        // Show or hide the hidden field based on the input value
        if (inputValue.trim() !== '') {
          $('#hiddenField').show();
        } else {
          $('#hiddenField').hide();
        }
      });
    });
  </script>


// Image Preview When file is edited
<script>
    $(document).ready(function () {
        // Image preview function
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Trigger the function on file input change
        $('#imageInput').change(function () {
            readURL(this);
        });
    });
    
        
    
    
</script>













