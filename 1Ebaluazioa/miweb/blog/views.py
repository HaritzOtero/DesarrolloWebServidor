from django.urls import reverse
from django.http import HttpResponseRedirect
from django.shortcuts import render
from .models import Post
# Create your views here.

def index(request):
    postak = Post.objects.all
    return render(request, 'index.html', {'posta': postak})

def add(request):
    return render(request, 'add.html')

def addpost(request):
    iz = request.POST["izenburua"]
    ed = request.POST["edukia"]

    postberria = Post(izenburua = iz, edukia=ed, noizsSortua = "")
    postberria.save()

    return HttpResponseRedirect(reverse(index))

def deletepost(request, id):
    ezabatzekopost = Post.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua
    Post.delete(ezabatzekopost) #ezabatu

    return HttpResponseRedirect(reverse(index))

def aldatu(request, id):
    postaldatu = Post.objects.get(id = id) 
    return render(request, 'update.html', {'posta': postaldatu})

def aldatupost(request, id):

        aldatzekopost = Post.objects.get(id = id) #izenburua pasatu eta bilatu izenburu hori duen objetua

        iz = request.POST["izenburua"]
        ed = request.POST["edukia"]

        aldatzekopost.izenburua = iz
        aldatzekopost.edukia = ed
        aldatzekopost.save()
        
        return HttpResponseRedirect(reverse(index))