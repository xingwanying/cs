
        <header style="background-image: url('{{ $info['cover_img_url']  }}')">
            @if($info['uavatar'] == null)
                <img src=" {{ asset('images/m21.jpg ')}}" class="img-circle">
            @else
                <img src="{{ $info['uavatar'] }}" class="img-circle">
            @endif
            <h6>
                @if( $info['utype'] == "110" )
                    <span class="label label-warning">小编</span>
                @endif
                {{ $info['uname'] }}
            </h6>
            <h2 >{{ $info['title'] }}</h2>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section id="h5">
                    <?php echo $info['html_url']; ?>
                </section>
            </div>
        </section>
