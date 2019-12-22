#-*- coding:utf-8 -*-
import re
import requests
import csv
import os


def dowmloadPic(html,keyword):


    pic_url = re.findall('"objURL":"(.*?)",',html,re.S)
    i = 0
    print '找到关键词:'+keyword+'的图片，现在开始下载图片...'
    for each in pic_url:
        string = keyword + str(i + 1) + '.jpg'
        if(os.path.exists(string)==False):
            print '正在下载第' + str(i + 1) + '张图片，图片地址:' + str(each)
            try:
                pic = requests.get(each, timeout=10)
            except requests.exceptions.ConnectionError:
                print '【错误】当前图片无法下载'
                continue
            # resolve the problem of encode, make sure that chinese name could be store
            fp = open(string.decode('utf-8').encode('cp936'), 'wb')
            fp.write(pic.content)
            fp.close()
            i += 1
            if i == 2: break;


    print keyword+'相关图片下载完毕'



if __name__ == '__main__':

    with open('city.csv','r') as csvfile:
        reader = csv.reader(csvfile)
        column = [row[2] for row in reader]
    column.remove(column[0])
    print column


    for city in column:
        word = city
        url = 'http://image.baidu.com/search/flip?tn=baiduimage&ie=utf-8&word=' + word + '&ct=201326592&v=flip'
        result = requests.get(url)
        dowmloadPic(result.text, word)




