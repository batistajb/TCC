<script type="text/javascript">
    $('select[name=serie]').change(function () {
        var serie = $(this).val();
        /*requisição na tabela das turmas*/
        $.get('/admin/ajax-team/' + serie, function (teams) {
            $('select[name=team_id]').empty();
            $.each(teams, function (key, value) {
                $('select[name=team_id]').append('<option value=' + value.id + '>' + value.name + '</option>')
            });
        });
        /*requisição na tabela das grades*/
        $.get('/admin/ajax-degree/' + serie, function (degree) {
            $('select[name=degree_id]').empty();
            $.each(degree, function (key, value) {
                $('select[name=degree_id]').append('<option value=' + value.id + '>' + value.year + '</option>')
            });
        });
    });

    $('.select-series').select2({
        placeholder: "Séries",
        allowClear:"true"
    });
    $('.select-team').select2({
        placeholder: "Turmas",
        allowClear:"true"
    });
</script>