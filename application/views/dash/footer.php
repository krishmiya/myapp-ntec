</div>

<!-- footer content -->
        <footer>
          <div class="pull-right">
            Ntec - Developed by <a href="https://www.facebook.com/krishu.dawatagolla">KSS</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!--<script src="<?php echo base_url();?>assets/dash/vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/dash/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/dash/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/dash/vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>assets/dash/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url();?>assets/dash/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/dash/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/dash/vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>assets/dash/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/dash/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>assets/dash/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>assets/dash/js/flot/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>assets/dash/js/flot/date.js"></script>
    <script src="<?php echo base_url();?>assets/dash/js/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>assets/dash/js/flot/curvedLines.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url();?>assets/dash/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- jVectorMap -->
    <script src="<?php echo base_url();?>assets/dash/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/dash/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/dash/js/datepicker/daterangepicker.js"></script>
    
    <!-- jquery.inputmask -->
    <script src="<?php echo base_url();?>assets/dash/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/dash/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- Custom Notification -->
    <script>
      $(document).ready(function() {
        var cnt = 10;

        TabbedNotification = function(options) {
          var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
            "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

          if (!document.getElementById('custom_notifications')) {
            alert('doesnt exists');
          } else {
            $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
            $('#custom_notifications #notif-group').append(message);
            cnt++;
            CustomTabs(options);
          }
        };

        CustomTabs = function(options) {
          $('.tabbed_notifications > div').hide();
          $('.tabbed_notifications > div:first-of-type').show();
          $('#custom_notifications').removeClass('dsp_none');
          $('.notifications a').click(function(e) {
            e.preventDefault();
            var $this = $(this),
              tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
              others = $this.closest('li').siblings().children('a'),
              target = $this.attr('href');
            others.removeClass('active');
            $this.addClass('active');
            $(tabbed_notifications).children('div').hide();
            $(target).show();
          });
        };

        CustomTabs();

        var tabid = idname = '';

        $(document).on('click', '.notification_close', function(e) {
          idname = $(this).parent().parent().attr("id");
          tabid = idname.substr(-2);
          $('#ntf' + tabid).remove();
          $('#ntlink' + tabid).parent().remove();
          $('.notifications a').first().addClass('active');
          $('#notif-group div').first().css('display', 'block');
        });
      });
    </script>
    <!-- /Custom Notification -->
  
  <script type="text/javascript" src="https://jqueryui.com/wp-includes/js/wp-embed.min.js?ver=4.5.2"></script>
  <script type="text/javascript" src="https://jqueryui.com/wp-includes/js/comment-reply.min.js?ver=4.5.2"></script>
  
  <!-- datepicker -->
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
   <!-- datepicker --> 
   <script type="text/javascript">
  $( function() {
    $( "#dOB, #ppIssuDate, #ppExpiryDate, #iExpiryDate, #iIssueDate, #cCDStartDate, #cCDFinishDate, #SSdc, #TScd, #ppVisaDate, #csDate, #ccDate, #ieltsDate, #TSdc" ).datepicker({
	  yearRange: "-50:+50",//50 year back and front
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-m-dd'
    });
  } );
  </script>
  <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
    <!--placeholder-->
<script>
    $('select').change(function() {
     if ($(this).children('option:first-child').is(':selected')) {
       $(this).addClass('placeholder');
     } else {
      $(this).removeClass('placeholder');
     }
    });

</script>
  </body>
</html>