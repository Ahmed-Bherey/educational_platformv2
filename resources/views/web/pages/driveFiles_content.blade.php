@extends('web.layouts.includes.main')
@section('content')
    <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
        <div class="responsive-wrapper 
            responsive-wrapper-wxh-572x612"
            style="-webkit-overflow-scrolling: touch; overflow: auto;">
            <iframe src="{{ asset('/uploads/file/' . $driveFile->file) }}">
                <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                        An &#105;frame should be displayed here but your browser version does not support &#105;frames.
                    </em>Please update your browser to its most recent version and try again.</p>
            </iframe>
        </div>
    </div>
@endsection
