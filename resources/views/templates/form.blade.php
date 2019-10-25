<div class="col-md-6 col-pull">
    <form class="form-class" id="con_form" action="/sendMessage" method="POST" >
        @csrf
        @method('post')
        @if (Session::has('msg') != null)
            <div class="alert alert-success" id="msg">Merci de votre message.</div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <input type="text" name="name" placeholder="Your name">
            </div>
            <div class="col-sm-6">
                <input type="text" name="email" placeholder="Your email">
            </div>
            <div class="col-sm-12">
                <input type="text" name="sujet" placeholder="Subject">
                <textarea name="message" placeholder="Message"></textarea>
                <button type="submit" class="site-btn">send</button>
            </div>
        </div>
    </form>
</div>