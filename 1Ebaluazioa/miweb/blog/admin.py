from django.contrib import admin
from .models import Post, Author
# Register your models here.

#class PostAdmin(admin.ModelAdmin):
   # list_dispaly = [('izenburua', 'edukia', 'noizSortua')]

#admin.site.register(Post, PostAdmin)


admin.site.register(Post)
admin.site.register(Author)