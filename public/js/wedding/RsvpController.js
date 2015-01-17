RsvpController = function() {
    /**
     * Search for a code
     * @returns void
     */
    this.search = function() {
        var code = $("#code").val();
        if(code.length==0){
            RsvpController.showError();
            return false;
        }
        $.ajax({
            url: "/rsvp/search-for-code/"+code,
            method: "POST",
            dataType: "json",
        }).done(function(callback) {
            var obj = jQuery.parseJSON(callback.model);
            if(obj.model=="CODE NOT FOUND"){
                RsvpController.showError();
            }else{
                $("#name").html(obj.name);
                $("#plusOne").val(obj.plusOneName);
                //do the radios
                if(obj.status=="Unknown"){
                    if(obj.plusOneName!=""){
                        $( "input[value='Coming +1']").prop('checked', true);
                    }else{
                        $( "input[value='Coming']").prop('checked', true);
                    }
                }else if(obj.status=="Coming"){
                    $( "input[value='Coming']").prop('checked', true);
                }else if(obj.status=="Not coming"){
                    $( "input[value='Not coming']").prop('checked', true);
                }else{
                    $( "input[value='Coming +1']").prop('checked', true);
                }
                $("#rsvpContainer").show();
            }
        });
    };
    
    /**
     * Show the error message if no code was found
     * @returns void
     */
    this.showError = function() {
        $("#errorModal").modal('show');setTimeout(function(){$("#errorModal").modal('hide');}, 6000);
    };
};
RsvpController = new RsvpController();