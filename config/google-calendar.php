<?php

return [

    /*
     * Path to the json file containing the credentials.
     */
    'service_account_credentials_json' => storage_path('app/google-calendar/ {
        "type": "service_account",
        "project_id": "myexpanse",
        "private_key_id": "0c281c44e2da94415c6a2e256a5908e1176e53fa",
        "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC89PtMNkFhdBar\nhCB6iMFi19w/Qlu5XGSxE/27SzWljwXdwTKTLbm6Wb76dZs6/8S8/UB4I1hf166W\nSAO5qajvnARcKhAAgJ4p15qvGHWzXAuIsMXY0zT8dGRDX7z6fDJUKkiOpqmOklVH\ndytdP67b7AQxO+47pfH4YJJs/Pp6kG/B+javh7bsNBDall9s2CQXtRLp9YOFMuZy\nOSnFJrrBVCeJhs0SvwLTI9tOMW1XwbQB9qhXLJuxVWwX6TRbknlHZFChffDVJ5hM\nlILoBThdouX8mhqEYr7wwv4w719c5OSt6aDpCYgj3CM4wv6LcI1HnZZlGPlH2vIu\nYEd54I9FAgMBAAECggEADk52IGUTOi+x77aHRv/HtJYnZNq/Wx91uDqNQXsGSsyz\nYwDXtXEG2OcmoIv6/tKSsMRz9ySl8kvAOjylm48O7WVgpyHAKGmUkBJ08cDmWHgl\nn2nS8QG8x0iAtuEuy8BPhzPUXoib2eGWd1y8ecjyklAiWR/yf62mzmlxbLMSu+jG\nWZLZKeGJu8QXWj/uMolVwqZM3IiPMQWxI4i3z29RmAK6nX97pboGBp8vhZfpsofa\nyaUn6eMPL6W2eitxvrRi6mBPYtOj1w4+b+nvckUH8Tq5xRGuJHvRbuEdUa/mYV7J\nKoeJbIl/YHKe2W5hdQmTxOuQKniN7pkkxf28Z9WJGQKBgQDkLuArH3TFdP/nS8an\nQJd3hanNOHJI4UQSboIKnJSzGcfPYeDhNTl6Vqk6WiEjcsSPokrthuHl7JxConsE\nPMQZ35iRciHePVemENTW3N6ZVlxBToySSaNlE87f5xl0M6QlQHjfbi044IDNf0Bj\nDU7PLY2B4bhayunOvQDbZBAbLwKBgQDT/fBSGmhmTloTj+FXQkFHJCZU6/HbUdsc\nl8rCspKYj0iFIaiLiDSL26fQ5NJPwMtW20nUqLja+0LoC8Ya9btoCJjJPQe8mszg\nekJWFJ6Co6syQltfq204f6WVu/9lKZsBmplPQE6+ztypMrArQiDgIH6jNxZOQSSO\nfVDaTuDPywKBgQCBq63Sc7bNO1btnx9ODqPE1V2QdQJlLjab7tbRpvfN69mjnXDJ\nKpD2V+cldPCeD2tqYIUKBHu9SL/oEiOsXcfnGCzAgsaCYAO+KJR7YdrR8sTMjBHQ\nVC6Zky8eCFtrsKkYTlIiTp8+Uj6ACU+Suo5NqAphg99bITLLPJcPFgcdGwKBgBUs\nnh51SMw/MzwU+PsQQRjsAXAmCQhRCsO2XahI0d+vIB08GWumdSkrDX4N/Pu+VBEe\n4ib9m0k0I6Ct3GHA/bEMesZO9EDgbWpWi92xPYvq8SSaACp0IvqrtUxZdM8T8smc\nOYfy8mqYmu3DhFktx77bQArpa67xTsd0uOi1TDs1AoGBAK0D8GcbjEhlnyeQ2ky/\nQ/RJDZLIeUVmc2pKYN1Xq6g3/LuizQ3MBfMegHg97Wfbo3a3XR8alE320tTXSC/e\nOsTknbArkaZx6LL/qkkjsk2etb3hl891MVmFMF4ApRm5vf1yn5pVqzTreomaKq4b\nzNIbaZ6SOwJ9DxhVCOL5qZMM\n-----END PRIVATE KEY-----\n",
        "client_email": "google-api@myexpanse.iam.gserviceaccount.com",
        "client_id": "118388193052719422990",
        "auth_uri": "https://accounts.google.com/o/oauth2/auth",
        "token_uri": "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/google-api%40myexpanse.iam.gserviceaccount.com"
      }'),

    
    /*
     *  The id of the Google Calendar that will be used by default.
     */
    'calendar_id' => env('GOOGLE_CALENDAR_ID'),

   
];
