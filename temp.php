
$user = User::find($request->_id);
        $dadosBrutos = file_get_contents('php://input');
        // $dados = json_decode($dadosBrutos, true);
        parse_str($dadosBrutos, $dados);
        // dd($_POST['pass'], $request->pass, $user->pass, $dados);
        if ($user->pass == NULL) {
            if ( $request->pass != NULL) {
            // $validated = $request->validateWithBag('updatePassword', [
            //     'pass' => ['confirmed:pass_check'],
            // ]);
                // dd('pass1');
                if ($request->pass == $request->pass_check) {
                    // dd('pass3');
                    $user->update([
                        'pass' => Hash::make(($request->pass)),
                    ]);
                    dd('pass4');
                } else {
                    dd('pass5');
                    return back()->with('status', 'password-not-confirmed');
                }
            } else if ( $user->pass_check != NULL) {// || Hash::check($request->pass, $user->pass)) {)
                dd('pass6');
                return back()->with('status', 'new-password-not-provided');
            } else {
                dd('pass7');
                return back()->with('status', 'all-ok-passwords-not-provided');
            }
        } else if ($user->pass != NULL && $request->pass != NULL) {
            dd('pass2');
            $validated = $request->validateWithBag('updatePassword', [
                'current_pass' => ['required', 'current_pass'],
                'pass' => ['confirmed:pass_check'],
            ]);
            dd('pass8');
            $user->update([
                'pass' => Hash::make(($validated['pass'])),
            ]);
            dd('pass9');
        }
        dd('pass10');
        // Auth::login($user);