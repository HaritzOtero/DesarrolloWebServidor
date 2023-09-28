from django.db import models

class Author(models.Model):
    izenAbizenak = models.CharField(max_length=100)
    jaiotzaData = models.DateField(auto_now_add=False, blank=True)
    gmail = models.EmailField(max_length=100)

    def __unicode__(self):
        return self.izena
    
# Create your models here.
class Post(models.Model):
    jokoIzena = models.CharField(max_length=100)
    deskripzioa = models.CharField(max_length=300)
    prezioa = models.IntegerField()
    author = models.ForeignKey(Author, on_delete=models.CASCADE)
    
    def __unicode__(self):
        return self.izenburua 

