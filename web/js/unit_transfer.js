jQuery(document).ready(function(){
    $('.unit_transfer_button').click(function(){
        link = $(this);
        $.getJSON(link.attr('href'), function(json){
            link.find('div').removeClass('add_unit_image');
            link.find('div').removeClass('remove_unit_image');
            link.find('div').addClass('unit_transfer_loader');
            if(json.result)
            {
                link.find('div').removeClass('unit_transfer_loader');
                link.attr('href', json.new_url);
                var message = '';
                if(json.type == 'added') 
                {
                    link.find('div').addClass('remove_unit_image');
                    message = 'Убрать из предзаказа'
                }
                else if(json.type == 'removed')
                {
                    link.find('div').addClass('add_unit_image');
                    message = 'В предзаказ'            
                }
                link.find('.message').html(message);
            }
            else
            {
                alert('Во время добавления возникла ошибка');
            }
        });

        return false;
    });
    
});