<x-mail::message>
# Introduction

Congratulations! Your job has been posted successfully.

<x-mail::button :url="'/jobs/{{ $job->id }}'">
    Review Job
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
