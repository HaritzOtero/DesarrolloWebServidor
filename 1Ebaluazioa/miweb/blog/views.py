from django.shortcuts import render
from .models import Post
# Create your views here.

def index(request):
    postak = Post.objects.all
    return render(request, 'index.html', {'posta': postak})