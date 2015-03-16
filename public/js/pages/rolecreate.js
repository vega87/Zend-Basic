$(document).ready(function() {
    $('#multiselectForm')
        .find('[name="group_select"]')
        .multiselect({
            // Re-validate the multiselect field when it is changed
            onChange: function(element, checked) {
                if(checked){
                    $('#multiselectForm').append('<input id="groups_'+$(element).val()+'" type="hidden" name="groups[]" value="'+$(element).val()+'">');
                } else {
                    $('#groups_'+$(element).val()).remove();
                }
                adjustByScrollHeight();
            },
            onDropdownShown: function(e) {
                adjustByScrollHeight();
            },
            onDropdownHidden: function(e) {
                adjustByHeight();
            }
        })
        .end();

    // You don't need to care about these methods
    function adjustByHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe when hiding the picker
            $iframe.height($body.height());
        }
    }

    function adjustByScrollHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe when showing the picker
            $iframe.height($body.get(0).scrollHeight);
        }
    }
});