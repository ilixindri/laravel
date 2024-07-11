// <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script>
function figerprint() {
    const fpPromise = import('https://openfpcdn.io/fingerprintjs/v4')
    .then(FingerprintJS => FingerprintJS.load())

    fpPromise
    .then(fp => fp.get())
    .then(result => {
      return result.visitorId
    })
}
