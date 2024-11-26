<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?= $this->include("layout/navbar") ?>
    <?= $this->renderSection("content") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home/css/style.css">
    <script>
    function imgPreview(){
      const sampul = document.querySelector('#sampul');
      const sampulLabel = document.querySelector('.form-control');
      const imgPreview = document.querySelector('.img-preview');
      sampulLabel.textContent = sampul.files[0].name;
      const filesampul = new FileRender();
      filesampul.readAsDataUrl(sampul.files[0]);
      filesampul.onload=function(e){
        imgPreview.src = e.target.result;
      }
    }
    </script>
  </body>
</html>