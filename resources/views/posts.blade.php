<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>Nene</title>
</head>
<body>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Posts</h1>

          <!-- Blog Post -->
          @foreach($posts as $post)
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text">{{ str_limit($post->body, 200) }}</p>
              <a href="{{ route('post', $post) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted {{ $post->created_at->diffForHumans() }}
            </div>
          </div>
          @endforeach
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          @auth
          <!-- New Post Widget -->
          <div class="card my-4">
            <h5 class="card-header">New Post</h5>
            <div class="card-body">
              <form method="POST" action="{{ route('create') }}">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="body">Content:</label>
                    <textarea class="form-control" rows="5" id="body" name="body"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Post</button>
              </form>
            </div>
          </div>
          @else
          <div class="card my-4">
            <p class="text-center"><a href="{{  route('login') }}">Login</a> to make a post</p>
          </div>
          @endauth
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ config('Blog.Nene') }} {{ date('Y') }}</p>
      </div>
      <!-- /.container -->
    </footer>
</body>
<!--bootstrap js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</html>