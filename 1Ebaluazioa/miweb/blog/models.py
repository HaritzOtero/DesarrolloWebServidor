from django.db import models

# Create your models here.

class Post(models.Model):
    izenburua = models.CharField(max_length=100)
    edukia = models.CharField(max_length=300)
    noizsSortua = models.DateTimeField(auto_now_add=True)
    author = models.CharField(max_length=300)
    
    def __unicode__(self):
        return self.izenburua

class Author(models.Model):
    izena = models.CharField(max_length=100)
    abizena = models.CharField(max_length=100)
    jaiotzaData = models.DateField(auto_now_add=False, blank=True)
    gmail = models.EmailField(max_length=100)

    def __unicode__(self):
        return self.izena