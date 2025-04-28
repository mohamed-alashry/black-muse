@extends('layouts.site')

@section('title', "Join Meeting")
@section('meta_title', "Join Meeting")
@section('meta_description', "Join Meeting")

@section('content')
<div id="meet"></div>

<script src="https://meet.jit.si/external_api.js"></script>

<script type="text/javascript">
var domain = "meet.jit.si";
var options = {
    startWithVideoMuted: true,
    configOverwrite: {
        prejoinPageEnabled: false,
        startWithVideoMuted: true,
        startWithAudioMuted: true,
    },
    interfaceConfigOverwrite: {
        DEFAULT_BACKGROUND: "#3b98ff",
        SHOW_JITSI_WATERMARK: false,
        HIDE_DEEP_LINKING_LOGO: true,
        SHOW_BRAND_WATERMARK: false,
        SHOW_WATERMARK_FOR_GUESTS: false,
        SHOW_POWERED_BY: false,
        TOOLBAR_BUTTONS: [
            'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
            'fodeviceselection', 'hangup', 'profile', 'recording',
            'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
            'videoquality', 'filmstrip', 'feedback', 'stats', 'shortcuts',
            'tileview'
        ],
    },
    participantMenuButtonsWithNotifyClick: [
        'allow-video', {key: 'ask-unmute', preventExecution: false},
        'conn-status', 'flip-local-video', 'grant-moderator',
        {key: 'kick', preventExecution: false},
        {key: 'hide-self-view', preventExecution: false},
        'mute', 'mute-others', 'mute-others-video', 'mute-video',
        'pinToStage', 'privateMessage', {key: 'remote-control', preventExecution: false},
        'send-participant-to-room', 'verify',
    ],
    roomName: 'BlackMuse', 
    width: "100%",
    height: 600,
    parentNode: document.querySelector('#meet'),
    lang: 'ar',
    userInfo: {
        email: '{{ auth("client")->user()->email }}',
        displayName: '{{ auth("client")->user()->name }}',
        role: 'moderator' 
    }
};

var api = new JitsiMeetExternalAPI(domain, options);

api.executeCommand('avatarUrl', "{{ asset('images/mainLogo.svg') }}");
api.executeCommand('logoImageUrl', "{{ asset('images/mainLogo.svg') }}");
api.executeCommand('logoClickUrl', '{{url("/")}}');


</script>
@endsection