#!usr/bin/env python

# -*- coding: utf-8 -*-

import os
import urllib2
import urllib
import cookielib
import re

Img_URL = 'http://jw.cuc.edu.cn/academic/getCaptcha.do'
Login_URL = 'http://jw.cuc.edu.cn/academic/j_acegi_security_check'
Class_URL = 'http://jw.cuc.edu.cn/academic/accessModule.do?moduleId=2000&groupId='
username = '201311113011'
password = '1996828xh!!!...'


def login():
    cj = cookielib.CookieJar()
    opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))
    urllib2.install_opener(opener)
    # get img
    img_req = urllib2.Request(Img_URL)
    img_response = opener.open(img_req)
    try:
        out = open('code.jpg', 'wb')
        # print img_response.read()
        out.write(img_response.read())
        out.flush()
        out.close()
        print 'get code success'
    except IOError:
        print 'file wrong'
        # input code
    img_code = raw_input("please input code: ")
    print 'your code is %s' % img_code
    # login
    LoginData = {
        'j_username': username,
        'j_password': password,
        'j_captcha': img_code,
    };
    login_req = urllib2.Request(Login_URL, urllib.urlencode(LoginData));
    login_req.add_header('User-Agent',
                         "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36");
    login_response = opener.open(login_req)
    print 'login success'
    fout = open("tt.html", "w")
    fout.write(login_response.read())
    fout.close()
    # load class info
    print 'load class'
    fout = open('t1.html', 'w')
    fout.write(opener.open(Class_URL).read())
    fout.close()


if __name__ == '__main__':
    login()