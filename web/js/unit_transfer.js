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

                count_block = $('#preorder_unit_count').find('.count');
                elements_count = count_block.html();
                
                var message = '';
                if(json.type == 'added') 
                {
                    link.find('div').addClass('remove_unit_image');
                    message = 'Убрать';
                    count_block.html(parseInt(elements_count)+1);
                    
                }
                else if(json.type == 'removed')
                {
                    link.find('div').addClass('add_unit_image');
                    message = 'В черновик';    
                    count_block.html(parseInt(elements_count)-1);     
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