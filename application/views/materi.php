<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .chat-list {padding:0; margin:20px; list-style: none;}
        .chat-item {padding:15px; margin:0 0 10px; background:white; border-radius: 10px;position: relative;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
         -khtml-user-select: none;
           -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
            }
        .chat-item p {margin:0;}
        .chat-item.chat-img {padding:0;}
        .chat-item.chat-img img {width: 100%;}
        .menu-chat {position: absolute;right: -25px;top: 0px;border: 0;border-radius: 0 5px 5px 0;color: #666;padding: 6px;width: 35px;}
        .copy-chat {position: absolute;right: -25px;top: 0px;border: 0;border-radius: 0 10px 10px 10px;color: #666;padding: 6px;width: 35px;-webkit-box-shadow:rgba(3, 1, 1, 0.25) -1px 1px 4px 1px;-moz-box-shadow:rgba(3, 1, 1, 0.25) -1px 1px 4px 1px;box-shadow:rgba(3, 1, 1, 0.25) -1px 1px 4px 1px;}
        .msg {position: fixed;bottom: 30px;left: 0;right: 0;text-align:center;}
        .msg span {background: rgba(0,0,0,.8);color:white;padding: 8px 40px; border-radius: 5px;}
        .msg.hide {opacity: 0;}
        .dnone {display: none;}
        .longtap {position: absolute;background: yellow;width: 100%;height: 100%;top: 0;left: 0;}
        .chat-title {white-space: nowrap;overflow: hidden;text-overflow: ellipsis;display: inline;padding-top: 5px; font-size:20px;position: absolute;padding-left: 13px; width:85%;}
    </style>

    <title><?= $title; ?> - Materi Pembinaan BP</title>
</head>
<body style="background-image:url(<?= base_url(); ?>assets/materi.jpg);height: 100%;">
    <div class="card" style="border-radius:0; position: fixed; width:100%;top:-2px;z-index: 100">
        <div class="card-header" style="background-color:#EDEDED; border:0">
            <a href="<?= $back; ?>" class="btn btn-sm btn-secondary">Back</a>
            <h4 class="chat-title m-0"><?= $title; ?></h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                
            <ul class="chat-list" style="margin-top:65px">
                <?php foreach($messages as $message): ?>
                    <?php if(strpos($message,'::') === 0): ?>
                        <li class="chat-item chat-img">
                            <img src="<?= base_url($filepath.substr($message,2)); ?>" alt="">
                        </li>
                    <?php elseif(strpos($message,';;') === 0): ?>
                        <li class="chat-item chat-img">
                            <div class="embed-responsive embed-responsive-16by9">
                                <video width="320" height="240" controls>
                                  <source src="<?= base_url($filepath.substr($message,2)); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <button class="btn btn-sm btn-info text-white copy-chat" onclick="mouseDown(this)">C</button>
                            <div class="chat-message sr-only"><?= base_url($filepath.substr($message,2)); ?></div>
                        </li>
                    <?php elseif(strpos($message,'%%') === 0): ?>
                        <li class="chat-item pt-4 pb-0 pl-0">
                            <audio controls>
                                <source src="<?= base_url($filepath.substr($message,2)); ?>" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                            <button class="btn btn-sm btn-info text-white copy-chat" onclick="mouseDown(this)">C</button>
                            <div class="chat-message sr-only"><?= base_url($filepath.substr($message,2)); ?></div>
                        </li>
                    <?php else: ?>
                        <li class="chat-item">
                            <!-- <div class="longtap" ontouchstart="mouseDown(this)" ontouchend="mouseUp(this)" onmousedown="mouseDown(this)" onmouseup="mouseUp(this)"></div> -->
                            <!-- <button class="menu-chat" data-toggle="modal" data-target="#chatoptModal">=</button> -->
                            <button class="btn btn-sm btn-info text-white copy-chat" onclick="mouseDown(this)">C</button>
                            <div class="chat-message sr-only"><?= nl2br($message); ?></div>
                            <div class="chat-msg-display"><?= nl2br($message); ?></div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>

            </div>
        </div>
    </div>

    <textarea id="chat-input-area" class="dnone" readonly></textarea>
    <div class="msg animate__animated hide animate__faster"><span>Message copied.</span></div>

    <!-- Modal -->
    <div class="modal fade" id="chatoptModal" tabindex="-1" aria-labelledby="chatoptModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
    function animate(elm, anim, mode){
        $(elm).addClass(anim);
        $(elm).on('animationend', function(){
            $(elm).removeClass(anim);
            if(mode == 'in')
                $(elm).removeClass('hide');
            else
                $(elm).addClass('hide');
        });
    }

    var longPressTimer;
    //Time of the long press
    const tempo = 500; //Time 1000ms = 1s
    const mouseDown = (e) => {
        $parent = $(e).parent();
        longPressTimer = setTimeout(function(){
            let chat = $parent.find('.chat-message').text();
            let chatBallon = $('#chat-input-area');
            chatBallon.val(chat);
            chatBallon.removeClass('dnone');
            chatBallon.select();
            document.execCommand("copy");
            chatBallon.addClass('dnone');
            animate('.msg','animate__fadeInUp', 'in');
            setTimeout(() => {animate('.msg','animate__fadeOutDown','out')}, 2000);
        }, tempo);
    };
    const mouseUp = () => {
        clearTimeout(longPressTimer);
    };

    $(function(){
        const regex1 = /(\*)([^*]+?)(\*)/g;
        const regex2 = /(_)([^_]+?)(_)/gs;
        $('.chat-msg-display').each(function(index){
            let text = $(this).html()
            text = text.replace(regex1 , '<b>$2</b>')
            text = text.replace(regex2 , '<i>$2</i>')
            $(this).html(text)
        })
    })
</script>
</body>
</html>