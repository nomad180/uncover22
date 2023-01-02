@props(['lessons'])
<x-lesson-card :lesson="$lessons[0]" />
@if ($lessons->count()>1)
    @foreach ($lessons->skip(1) as $lesson)
        <x-lesson-card :lesson="$lesson"/>
    @endforeach
@endif
