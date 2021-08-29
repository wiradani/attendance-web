<?php
    
    function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
        if ($content != '') {
                return  '<p class="box-msg">
                              <div class="info-box alert-' .$type .'">
                                      <div class="info-box-icon">
                                        <i class="fa ' .$icon .'"></i>
                                      </div>
                                      <div class="info-box-content" style="font-size:' .$size .'">
                                        ' .$content
                                .'</div>
                                  </div>
                            </p>';
        }
    }

    function show_succ_msg($content='', $size='14px') {
        if ($content != '') {
                return   '<p class="box-msg">
                              <div class="info-box alert-success">
                                      <div class="info-box-icon">
                                        <i class="fa fa-check-circle"></i>
                                      </div>
                                      <div class="info-box-content" style="font-size:' .$size .'">
                                        ' .$content
                                .'</div>
                                  </div>
                            </p>';
        }
    }

    function show_err_msg($content='', $size='14px') {
        if ($content != '') {
                return   '<p class="box-msg">
                              <div class="info-box alert-error">
                                      <div class="info-box-icon">
                                        <i class="fa fa-warning"></i>
                                      </div>
                                      <div class="info-box-content" style="font-size:' .$size .'">
                                        ' .$content
                                .'</div>
                                  </div>
                            </p>';
        }
    }

    function show_my_confirm($id='', $class='', $title='Warning!', $yes = 'Yes') {
        $no = 'No';
        if ($id != '') {
          echo '<div <div class="modal fade" id="' .$id .'"  role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">          
                    <h1 class="card-title p-3">
                      <img src="https://ipqi.org/wp-content/uploads/2015/11/logo-pertamina.png"
                             alt="AdminLTE Logo"
                             class="fas  mr-1"
                             style="opacity: .8; height: 30px; width: 30px;">   
                      ' .$title .' 
                    </h1>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                  
                <div id="the whole thing" style="height:100%; width:100%; overflow: hidden;">
                  <div id="leftThing" style="float: left; width:50%;">
                    <button class="btn btn-primary  ' .$class .'" style="width:90%; margin-left: 5%;margin-right: 5%;"> ' .$yes .'</button>
                  </div>
                  <div id="rightThing" style="float: left; width:50%;">
                    <button class="btn btn-danger" data-dismiss="modal" style="width:90%; margin-left: 5%;margin-right: 5%;">' .$no .'</button>
                  </div>
                </div>
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  ';
        }
    }
    
    
    // MODAL
    function show_my_modal($content='', $id='', $data='', $size='md') {
            $_ci = &get_instance();

            if ($content != '') {
                    $view_content = $_ci->load->view($content, $data, TRUE);

                    return '<div class="modal fade" id="' .$id .'" role="dialog">
                                      <div class="modal-dialog modal-' .$size .'" role="document">
                                        <div class="modal-content">
                                            ' .$view_content .'
                                        </div>
                                      </div>
                                    </div>';
            }
    }

?>