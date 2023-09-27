from django.urls import reverse
from django.http import HttpResponseRedirect
from django.shortcuts import render
from .models import Post, Author

def index(request):
    postak = Post.objects.all
    return render(request, 'index.html', {'posta': postak})

def authors(request):
    autoreak = Author.objects.all
    return render(request, 'autoreak.html', {'author': autoreak})

def add(request):
    return render(request, 'add.html')

def addAuthor(request):
     return render(request, 'addAuthor.html')

def addpostAuthor(request):
    iz = request.POST["izenAbizenak"]
    jaiotzaData = request.POST["jaiotzaData"]
    gmail = request.POST["gmail"]

    autoreberria = Author(izenAbizenak = iz, jaiotzaData=jaiotzaData, gmail = gmail)

    autoreberria.save()

def addpost(request):
    iz = request.POST["jokoIzena"]
    ed = request.POST["deskripzioa"]
    prezioa = request.POST["prezioa"]
    author = request.POST["author"]

    postberria = Post(jokoIzena = iz, deskripzioa=ed, prezioa = prezioa, author = author)
    postberria.save()

    return HttpResponseRedirect(reverse(index))

def deletepost(request, id):
    ezabatzekopost = Post.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua
    Post.delete(ezabatzekopost) #ezabatu

    return HttpResponseRedirect(reverse(index))

def deleteAuthor(request, id):
    ezabatzekoautorea = Author.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua
    Author.delete(ezabatzekoautorea) #ezabatu

    return HttpResponseRedirect(reverse(index))

def aldatu(request, id):
    postaldatu = Post.objects.get(id = id) 
    return render(request, 'update.html', {'posta': postaldatu})

def aldatupost(request, id):

        aldatzekopost = Post.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua

        iz = request.POST["jokoIzena"]
        ed = request.POST["deskripzioa"]
        prezioa  = request.POST["prezioa"]
        author = request.POST["author"]
        
        aldatzekopost.jokoIzena = iz
        aldatzekopost.deskripzioa = ed
        aldatzekopost.prezioa = prezioa
        aldatzekopost.author = author
        aldatzekopost.save()
        
        return HttpResponseRedirect(reverse(index))