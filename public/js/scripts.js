
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
           // localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    $('#upload').on('change', function(e){
        $('#file-chosen').text(this.files.length==1? this.files[0].name : this.files.length +' images');
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var url=null;
    var images=[];
    $(document).on('click', ".delete-image", function(e) {
        e.preventDefault();
         images.push(this.id);
         this.parentNode.remove();
         url=this;
        });

        $('#submit').on('click',function(){
        $.ajax({
            type: 'POST',
            url : url.href,
            data: {images : images},
            });
        });


        $(document).on('click', ".delete_vehicule", function(e) {
            e.preventDefault();
            var vehicule=this;
            $('#delete').on('click',function(){
                $.ajax({
                    type: 'delete',
                    url : vehicule.action,
                    success: function(data) {
                        vehicule.parentNode.parentNode.remove();
                        var  message='<div class="alert alert-success"><strong>'+data.success+'</strong></div>';
                        $('.container').prepend(message);
                        }
                    });
            });
            });

        $(document).on('click', ".delete_agency", function(e) {
            e.preventDefault();
            var agency=this;
            $('#delete').on('click',function(){
                $.ajax({
                    type: 'delete',
                    url : agency.action,
                    success: function(data) {
                        agency.parentNode.parentNode.remove();
                        var  message='<div class="alert alert-success"><strong>'+data.success+'</strong></div>';
                        $('.container').prepend(message);
                        }
                    });
            });
            });

            $(document).on('click', ".delete_user", function(e) {
                e.preventDefault();
                var user=this;
                $('#delete').on('click',function(){
                    $.ajax({
                        type: 'delete',
                        url : user.action,
                        success: function(data) {
                            user.parentNode.parentNode.remove();
                            var  message='<div class="alert alert-success"><strong>'+data.success+'</strong></div>';
                            $('.container').prepend(message);
                            }
                        });
                });
                });
            $(document).on('click', ".delete_reservation", function(e) {
                e.preventDefault();
                var reservation=this;
                $('#delete').on('click',function(){
                    $.ajax({
                        type: 'delete',
                        url : reservation.action,
                        success: function(data) {
                            reservation.parentNode.parentNode.remove();
                            var  message='<div class="alert alert-success"><strong>'+data.success+'</strong></div>';
                            $('.container').prepend(message);
                            }
                        });
                });
            });

            $(document).on('click', ".delete_invoice", function(e) {
                e.preventDefault();
                var invoice=this;
                $('#delete').on('click',function(){
                    $.ajax({
                        type: 'delete',
                        url : invoice.action,
                        success: function(data) {
                            invoice.parentNode.parentNode.remove();
                            var  message='<div class="alert alert-success"><strong>'+data.success+'</strong></div>';
                            $('.container').prepend(message);
                            }
                        });
                });
            });
