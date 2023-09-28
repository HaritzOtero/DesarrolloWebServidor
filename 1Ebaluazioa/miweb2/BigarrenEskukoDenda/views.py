from django.urls import reverse
from django.http import HttpResponseRedirect
from django.shortcuts import render
from .models import Post, Author

def index(request):
    postak = Post.objects.all
    return render(request, 'index.html', {'posta': postak})

def authors(request):
    autoreak = Author.objects.all
    return render(request, 'autoreak.html', {'authors': autoreak})

def add(request):
    autoreak = Author.objects.all
    return render(request, 'add.html', {'authors': autoreak})

def addAuthor(request):
     return render(request, 'addAuthor.html')

def addpostAuthor(request):
    iz = request.POST["izenAbizenak"]
    jaiotzaData = request.POST["jaiotzaData"]
    gmail = request.POST["gmail"]

    autoreberria = Author(izenAbizenak = iz, jaiotzaData=jaiotzaData, gmail = gmail)

    autoreberria.save()

    return HttpResponseRedirect(reverse(authors))
def addpost(request):
    authorid = request.POST["author"]
    iz = request.POST["jokoIzena"]
    ed = request.POST["deskripzioa"]
    prezioa = request.POST["prezioa"]
    author = Author.objects.get(id=authorid)

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

    return HttpResponseRedirect(reverse(authors))

def aldatu(request, id):
    postaldatu = Post.objects.get(id=id) 
    autoreak = Author.objects.all()  # Agrega los paréntesis para obtener todos los autores
    return render(request, 'update.html', {'posta': postaldatu, 'authors': autoreak})

def aldatuAuthors(request, id):
    authoraldatu = Author.objects.get(id=id) 
    return render(request,'aldatuAuthor.html', {'author': authoraldatu})

def aldatuAuthorPost(request, id):
    iz = request.POST["izenAbizenak"]
    jaiotzaData = request.POST["jaiotzaData"]
    gmail = request.POST["gmail"]

    autoreberria = Author(izenAbizenak = iz, jaiotzaData=jaiotzaData, gmail = gmail)

    autoreberria.save()

    return HttpResponseRedirect(reverse(authors))
def aldatupost(request, id):

        aldatzekopost = Post.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua
        

        iz = request.POST["jokoIzena"]
        ed = request.POST["deskripzioa"]
        prezioa  = request.POST["prezioa"]
        author = request.POST["author"]
        autoreberria = Author.objects.get(id = author)

        aldatzekopost.jokoIzena = iz
        aldatzekopost.deskripzioa = ed
        aldatzekopost.prezioa = prezioa
        aldatzekopost.author = autoreberria
        aldatzekopost.save()
        
        return HttpResponseRedirect(reverse(index))