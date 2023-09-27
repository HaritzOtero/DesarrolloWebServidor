from django.urls import path
from . import views

urlpatterns = [
    path ('', views.index, name='index'),
    path ('authors/', views.authors, name='add'),
    path ('add/', views.add, name='add'),
    path ('add/addpost/', views.addpost, name='addpost'),
    path ('ezabatu/', views.deletepost, name='ezabatu'),
    path ('ezabatu/<int:id>/', views.deletepost, name='ezabatu'),
    path ('ezabatuAutorea/<int:id>/', views.deleteAuthor, name='ezabatu'),
    path ('aldatu/<int:id>/', views.aldatu),
    path ('aldatupost/<int:id>/', views.aldatupost),
    path ('authors/addAuthor/', views.addAuthor, name='addAuthor'),
    path ('authors/addAuthor/addpostAuthor/', views.addpostAuthor, name='addpostAuthor'),
]