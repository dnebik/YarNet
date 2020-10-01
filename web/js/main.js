$(document).ready(function(){


});


$('#fillform-liters').on('change', function () {
    let $value = parseInt($('#fillform-liters').val(), 10);

    let $tanks = $('.progress-bar');
    let $id;
    let $min = -1;
    for (let $i = 0; $i < $tanks['length']; $i++)
    {
        let $split = $tanks[$i]['textContent'].split('/');
        let $fullness = parseInt($split[0], 10);
        let $quantity = parseInt($split[1], 10);

        if ($fullness < $quantity)
        {
            if ($min == -1)
            {
                $min = $fullness;
                if (($value + $fullness) <= $quantity)
                {
                    $id = $i + 1;
                }
            }
            else
            if ($fullness < $min && ($value + $fullness) <= $quantity)
            {
                $min = $fullness;
                $id = $i + 1;
            }
        }
    }

    if ($id)
    {
        $('#fillform-id_tank').val($id);
        $('#success').prop('disabled', false);
    } else {
        $('#fillform-id_tank').val('Нет подходящей цистерны');
        $('#success').prop('disabled', true);
    }
});