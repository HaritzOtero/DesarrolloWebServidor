from django.urls import path
from . import views

urlpatterns = [
    path ('', views.index, name='index'),
    path ('add/', views.add, name='add'),
    path ('add/addpost/', views.addpost, name='addpost'),
    path('ezabatu/', views.deletepost, name='ezabatu'),
    path ('ezabatu/<int:id>/', views.deletepost, name='ezabatu'),
    path('aldatu/<int:id>/', views.aldatu),
    path ('aldatupost/<int:id>/', views.aldatupost),
]