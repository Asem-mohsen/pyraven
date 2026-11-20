New inquiry from {{ $config['app_name'] }}

Name:    {{ $inquiry->name }}
Email:   {{ $inquiry->email }}
Phone:   {{ $inquiry->phone ?: '—' }}
Subject: {{ $inquiry->subject ?: '—' }}
Sent from: {{ $language }} site

Message:
{{ $inquiry->message }}

—
Received {{ $inquiry->created_at?->timezone('Africa/Cairo')->format('j M Y, H:i') }} (Cairo time). Reply directly to this email to answer {{ $inquiry->name }}.
