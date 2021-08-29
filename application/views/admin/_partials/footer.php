<!-- Sticky Footer -->
<footer class="sticky-footer" style="height: 30px;">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <strong>Copyright &copy; 2020 <a href="https://pcsindonesia.co.id/" target="_blank">WR</a>.</strong> All rights reserved. <b>v</b>1.0.6
    </div>
  </div>
</footer>


<script type="text/javascript">
function getLogActivity(client_code, user_id, site, form, action){
    $.ajax({
	  url: '<?php echo site_url("/user/Login/setLogActivity")?>',
	  type: 'POST',
	  data: {param0:client_code,param1:user_id,param2:site,param3:form,param4:action }
	});
}
</script>

<script type="text/javascript">
  function goLogGeneral($param1, $param2){   
    getLogActivity('<?php echo $client_code;?>', '<?php echo $user_id;?>', '<?php echo site_url();?>',''+$param1,''+$param2);
  }
</script>




<script>
  $(function () {
    $('#table_status').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 3, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
  });
</script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#idTableMor').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 6, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#idTableFirstHeartBeat').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "pageLength": 25,
      "order": [[ 7, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#idTableTreg').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_TypeDetail').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 2, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_TypeTerminal').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 3, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#idTableMorCodo').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 3, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#idTableCocoDodo').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
      // "order": [[ 2, "desc" ]]
    });
    $('#table_mor_spbu_terminal_codo').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 4, "desc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_mor_spbu_terminal').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 5, "asc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_mor_spbu_terminal_exp').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 5, "asc" ]],
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_spbu_terminal_codo_spbu').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
      'buttons': [
          'copy', 'excel'
      ]
    });
    $('#table_treg_witel').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_chart').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "scrollX": true
    });
    $('#table_chart2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "scrollX": true
    });

    $('#table_data_single_search').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "scrollX": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_data_single_search_no_order').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "scrollX": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "dom": 'Bfrtip',
        "buttons": [
          'copy', 'excel'
        ]
    });
    $('#table_user').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "pageLength": 25,
    });
  });
</script>
