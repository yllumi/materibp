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
<body style="background-image:url(<?= base_url(); ?>assets/kalender.jpg);height: 100%;">
    <div class="card" style="border-radius:0; position: fixed; width:100%;top:-2px;z-index: 100">
        <div class="card-header" style="background-color:#EDEDED; border:0">
            <a style="display:inline-block;" href="<?= site_url(); ?>"><img src="<?= base_url('assets/home.png'); ?>" alt="Home" width="24px"></a>
            <span style="display:inline-block;vertical-align:top;" class="lead ml-3"><a href="<?= site_url('kalender'); ?>">Kalender Konten</a></span>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 80px">
        <div class="row justify-content-center">
            <?php foreach ($index as $subfolder): ?>
            <div class="col-4">

                <div class="card mb-3">
                    <div class="list-group list-group-flush">
                        <?php if($folder): ?>
                            <a href="<?= site_url('kalender/detail/'.$folder.'/'.$subfolder); ?>" class="list-group-item list-group-item-action text-nowrap text-center"><?= str_replace(['/','-'], ' ', $subfolder); ?></a>
                        <?php else: ?>
                            <a href="<?= site_url('kalender/index/'.$subfolder); ?>" class="list-group-item list-group-item-action text-nowrap text-center"><?= str_replace(['/','-'], ' ', $subfolder); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
      </div>
  </div>
</body>
</html>