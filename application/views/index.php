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
        .msg {position: fixed;bottom: 30px;left: 0;right: 0;text-align:center;}
        .msg span {background: rgba(0,0,0,.8);color:white;padding: 8px 40px; border-radius: 5px;}
        .msg.hide {opacity: 0;}
        .dnone {display: none;}
        .draft {background-color: #eee !important;color: #aaa !important;}
    </style>

    <title>Materi Pembinaan British Propolis</title>
</head>
<body style="background-image:url(<?= base_url(); ?>assets/bg.jpg);height: 100%;">
    <div class="card" style="border-radius:0; position: fixed; width:100%;top:-2px;z-index: 100">
        <div class="card-header" style="background-color:#EDEDED; border:0">
            Materi Pembinaan BP
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <?php foreach ($index as $folder => $files): ?>
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <strong>Kelas <?= rtrim(substr($folder, 3),'/'); ?></strong>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php foreach ($files as $file): ?>
                            <a href="<?= site_url('materi/detail/'.$folder.$file['file']); ?>" class="list-group-item list-group-item-action <?= ($file['status'] ?? 'publish') == 'draft' ? 'draft disabled' : 'publish';?>"><?= $file['title']; ?></a>
                        <?php endforeach; ?>
                    </div>
              </div>
                <?php endforeach; ?>

          </div>
      </div>
  </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</body>
</html>