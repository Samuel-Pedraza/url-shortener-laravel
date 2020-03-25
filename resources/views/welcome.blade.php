<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>URL Shortener</title>
  </head>
  <body>

    {{-- form submission --}}
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 pt-5 text-center">
            <h1>Generate A Tiny URL</h1>
          </div>
          <div class="col-md-8 offset-md-2 pt-5">
            <form action="/" method="post">
              @csrf
              <div class="form-group">
                <input type="text" name="url" class="form-control" placeholder="URL">
              </div>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Generate Tiny URL">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    {{-- display previous URL's --}}
    <div class="container-fluid pt-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">
                  Submitted URL
                </th>
                <th scope="col">
                  Generated URL
                </th>
                <th scope="col">

                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($links as $link)
                <tr>
                  <td>
                    {{ $link->main_url }}
                  </td>
                  <td>
                    <a href="{{ secure_url($link->generated_url) }}" class="link">
                      ite.io/{{ $link->generated_url }}
                    </a>
                  </td>
                  <td>
                      <img src="/images/copy.svg" height="25px" class="copy" data-url="{{ url($link->generated_url) }}">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </body>
</html>
<script type="text/javascript">
  var copy_text = document.querySelectorAll(".copy");

  for (var iterate_copy = 0; iterate_copy < copy_text.length; iterate_copy++) {
    copy_text[iterate_copy].addEventListener("click", function(event){
      navigator.clipboard.writeText(this.getAttribute("data-url"));
    })
  }

</script>
